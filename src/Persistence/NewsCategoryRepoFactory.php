<?php

namespace App\Persistence;

use App\Interfaces\FactoryInterface;
use App\System\ServiceManager;

class NewsCategoryRepoFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        $dbConnection = $serviceManager->get(DbConnection::class);
        $conn = $dbConnection->getConnection();
        return new NewsCategoryRepo($conn);
    }
}