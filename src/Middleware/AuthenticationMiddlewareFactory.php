<?php

namespace App\Middleware;

use App\Interfaces\FactoryInterface;
use App\System\ServiceManager;

class AuthenticationMiddlewareFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        return new AuthenticationMiddleware($serviceManager);
    }
}