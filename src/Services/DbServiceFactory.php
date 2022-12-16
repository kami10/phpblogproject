<?php

namespace App\Services;

use App\Interfaces\FactoryInterface;
use App\System\ServiceManager;

class DbServiceFactory implements FactoryInterface
{
    public function __invoke(ServiceManager $serviceManager)
    {
        $dbConnection = $serviceManager->get(DbConnection::class);
        return new DbService($dbConnection);
    }
}