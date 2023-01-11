<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Persistence\LoginTableRepo;
use App\Persistence\NewsTableRepository;
use App\Services\DbService;
use App\Services\TemplateRenderer;
use App\System\ServiceManager;

class LoginFactory implements FactoryInterface
{
    public function __invoke(ServiceManager $serviceManager)
    {
        $template = $serviceManager->get(TemplateRenderer::class);
        $loginRepo = $serviceManager->get(LoginTableRepo::class);
        return new Login($template, $loginRepo);
    }
}