<?php

namespace App\Services;

use App\Persistence\SettingTableRepo;

class TemplateRenderer
{
    private string $path;
    private SettingTableRepo $settingTableRepo;

    public function __construct(SettingTableRepo $settingTableRepo)
    {
        $this->settingTableRepo = $settingTableRepo;
    }

    public function setPath()
    {
        $this->path = $this->settingTableRepo->getSettingTemplate()['inputvalue'];
    }

    public function render($filename, array $viewVariable = [])
    {
        $this->setPath();
        include __DIR__ . '/../Templates/' . $this->path . "/" . $filename;
    }
}