<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Services\DbService;
use App\Services\TemplateRenderer;
use App\System\ServiceManager;

class FullNewsController implements FactoryInterface
{
    public function __invoke(ServiceManager $serviceManager)
    {
        $template = $serviceManager->get(TemplateRenderer::class);
        $dbService = $serviceManager->get(DbService::class);

        return new FullNews($template, $dbService);
    }
}