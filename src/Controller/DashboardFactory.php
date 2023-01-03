<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Persistence\NewsTableRepository;
use App\Persistence\SettingTableRepo;
use App\Services\DbService;
use App\Services\TemplateRenderer;
use App\System\ServiceManager;

class DashboardFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        $template = $serviceManager->get(TemplateRenderer::class);
        $settingRepo = $serviceManager->get(SettingTableRepo::class);

        return new Dashboard($template, $settingRepo);
    }
}