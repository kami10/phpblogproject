<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Persistence\CommentTableRepo;
use App\Persistence\NewsCategoryRepo;
use App\Persistence\NewsTableRepository;
use App\Services\DbService;
use App\Services\RedisClient;
use App\Services\TemplateRenderer;
use App\System\ServiceManager;

class FullNewsController implements FactoryInterface
{
    public function __invoke(ServiceManager $serviceManager)
    {
        $template = $serviceManager->get(TemplateRenderer::class);
        $newsRepo = $serviceManager->get(NewsTableRepository::class);
        $commentRepo = $serviceManager->get(CommentTableRepo::class);
        $newsCategoryRepo = $serviceManager->get(NewsCategoryRepo::class);
        $redisClient = new RedisClient();

        return new FullNews($template, $newsRepo, $commentRepo, $newsCategoryRepo, $redisClient);
    }
}