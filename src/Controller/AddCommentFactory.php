<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Services\DbService;
use App\Services\TemplateRenderer;
use App\System\ServiceManager;

class AddCommentFactory implements FactoryInterface
{
    public function __invoke(ServiceManager $serviceManager)
    {
        $dbService = $serviceManager->get(DbService::class);
        $template = $serviceManager->get(TemplateRenderer::class);

        return new AddComment($dbService, $template);
    }
}