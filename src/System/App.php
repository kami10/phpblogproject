<?php

namespace App\System;

use App\Interfaces\ControllerInterface;
use App\Interfaces\MiddlewareInterface;

class App
{
    private ServiceManager $serviceManager;

    public function __construct(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    public function run()
    {
        $address = $_GET['path'] ?? 'home';
        $router = $this->serviceManager->get(Router::class);
        $routeclass = $router->resolve($address);

        if (is_array($routeclass)) {
            foreach ($routeclass as $item => $value) {
                $handler = $this->serviceManager->get($value);
                if ($handler instanceof MiddlewareInterface) {
                    $handler->process();
                }
                if ($handler instanceof ControllerInterface) {
                    echo $handler->handle();
                    return;
                }
            }
        } else {
            $handler = $this->serviceManager->get($routeclass);
            if ($handler instanceof ControllerInterface) {
                echo $handler->handle();
                return;
            }
        }
    }
}