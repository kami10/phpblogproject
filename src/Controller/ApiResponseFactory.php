<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Services\DbService;
use App\System\ServiceManager;

class ApiResponseFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        $dbService = $serviceManager->get(DbService::class);

        return new ApiResponse($dbService);
    }
}