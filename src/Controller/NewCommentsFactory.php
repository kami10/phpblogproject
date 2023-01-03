<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Persistence\CommentTableRepo;
use App\Persistence\NewsTableRepository;
use App\Services\DbService;
use App\Services\TemplateRenderer;
use App\System\ServiceManager;

class NewCommentsFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        $newsRepo = $serviceManager->get(CommentTableRepo::class);
        $template = $serviceManager->get(TemplateRenderer::class);

        return new NewComments($template, $newsRepo);
    }
}