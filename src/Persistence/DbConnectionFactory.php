<?php

namespace App\Persistence;

use App\Interfaces\FactoryInterface;
use App\System\ServiceManager;

class DbConnectionFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager): DbConnection
    {
        return new DbConnection($serviceManager->get('config')['database'] ?? []);
    }
}