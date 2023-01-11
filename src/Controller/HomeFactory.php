<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Persistence\NewsTableRepository;
use App\Services\DbService;
use App\Services\Pagination;
use App\Services\TemplateRenderer;
use App\System\ServiceManager;

class HomeFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        $templateRenderer = $serviceManager->get(TemplateRenderer::class);
        $pagination = $serviceManager->get(Pagination::class);

        return new Home($templateRenderer, $pagination);
    }
}