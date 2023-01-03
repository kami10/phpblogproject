<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Persistence\NewsTableRepository;
use App\Services\Pagination;
use App\Services\TemplateRenderer;
use App\System\ServiceManager;

class DraftFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        $template = $serviceManager->get(TemplateRenderer::class);
        $newsRepo = $serviceManager->get(NewsTableRepository::class);
        $pagination = $serviceManager->get(Pagination::class);

        return new Draft($template, $newsRepo, $pagination);
    }
}