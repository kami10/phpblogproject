<?php

namespace App\System;

use App\Interfaces\FactoryInterface;

class AppFactory implements FactoryInterface
{
    public function __invoke(ServiceManager $serviceManager)
    {
        return new App($serviceManager);
    }
}
