<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Persistence\NewsTableRepository;
use App\Services\DbService;
use App\Services\TemplateRenderer;
use App\System\ServiceManager;

class UpdateNewsFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        $template = $serviceManager->get(TemplateRenderer::class);
        $newsRepo = $serviceManager->get(NewsTableRepository::class);

        return new UpdateNews($template,$newsRepo);
    }
}