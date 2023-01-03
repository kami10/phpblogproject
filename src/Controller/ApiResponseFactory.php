<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Persistence\NewsTableRepository;
use App\Services\DbService;
use App\System\ServiceManager;

class ApiResponseFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        $newsRepo = $serviceManager->get(NewsTableRepository::class);
        return new ApiResponse($newsRepo);
    }
}