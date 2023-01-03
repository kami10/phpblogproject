<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Persistence\SettingTableRepo;
use App\Services\DbService;
use App\Services\TemplateRenderer;

class Dashboard implements ControllerInterface
{
    private TemplateRenderer $templateRenderer;
    private SettingTableRepo $settingTableRepo;

    public function __construct(TemplateRenderer $templateRenderer, SettingTableRepo $settingTableRepo)
    {
        $this->templateRenderer = $templateRenderer;
        $this->settingTableRepo = $settingTableRepo;
    }

    public function handle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $value = $_GET['subject'] ?? 'blue';
            $this->settingTableRepo->addSetting('template', $value);
        }

        return $this->templateRenderer->render('dashboard.php');
    }
}