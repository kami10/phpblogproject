<?php

namespace App\System;

use Exception;

class Router
{
    private ServiceManager $serviceManager;

    public function __construct(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    public function resolve(string $address)
    {
        $config = $this->serviceManager->get('config');
        $output = $config['routes'][$address];

        if ($output !== null) {
            return $output;
        }
        throw new Exception('route not found');
    }
}