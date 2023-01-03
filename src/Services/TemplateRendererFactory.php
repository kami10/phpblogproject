<?php

namespace App\Services;

use App\Interfaces\FactoryInterface;
use App\Persistence\SettingTableRepo;
use App\System\ServiceManager;

class TemplateRendererFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        return new TemplateRenderer($serviceManager->get(SettingTableRepo::class));
    }
}