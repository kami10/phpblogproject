<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Persistence\NewsCategoryRepo;
use App\Persistence\NewsTableRepository;
use App\Services\DbService;
use App\Services\TemplateRenderer;
use App\System\ServiceManager;

class AddNewsFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        $template = $serviceManager->get(TemplateRenderer::class);
        $newsRepo = $serviceManager->get(NewsTableRepository::class);
        $newsCategoryRepo = $serviceManager->get(NewsCategoryRepo::class);

        return new AddNews($template, $newsRepo, $newsCategoryRepo);
    }
}