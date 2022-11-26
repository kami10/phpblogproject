<?php

namespace App\Interfaces;

use App\System\ServiceManager;

interface FactoryInterface
{
    public function __invoke(ServiceManager $serviceManager);
}