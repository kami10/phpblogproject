<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Services\Pagination;
use App\Services\TemplateRenderer;
use App\System\ServiceManager;

class AdminFactory implements FactoryInterface
{
    public function __invoke(ServiceManager $serviceManager)
    {
        $template = $serviceManager->get(TemplateRenderer::class);
        $pagination = $serviceManager->get(Pagination::class);

        return new Admin($template, $pagination);
    }
}