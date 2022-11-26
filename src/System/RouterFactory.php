<?php

namespace App\System;

use App\Interfaces\FactoryInterface;
use App\System\ServiceManager;

class RouterFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        return new Router($serviceManager);
    }
}