<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Services\DbService;
use App\Services\Pagination;
use App\Services\TemplateRenderer;
use App\System\ServiceManager;

class HomeFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        $dbService = $serviceManager->get(DbService::class);
        $templateRendere = $serviceManager->get(TemplateRenderer::class);
        $pagination = $serviceManager->get(Pagination::class);

        return new Home($templateRendere, $dbService, $pagination);
    }
}