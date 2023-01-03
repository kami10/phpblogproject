<?php

namespace App\Persistence;

use App\Interfaces\FactoryInterface;
use App\System\ServiceManager;

class LoginTableRepoFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        $dbConnection = $serviceManager->get(DbConnection::class);
        $conn = $dbConnection->getConnection();
        return new LoginTableRepo($conn);
    }
}