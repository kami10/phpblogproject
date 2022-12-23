<?php

namespace App\Services;

class TemplateRenderer
{
    private DbService $dbService;
    private string $path;

    public function __construct(DbService $dbService)
    {
        $this->dbService = $dbService;
    }

    public function setPath()
    {
        $this->path = $this->dbService->getSettingTemplate()['inputvalue'];
    }

    public function render($filename, array $viewVariable = [])
    {
        $this->setPath();
        include __DIR__ . '/../Templates/' . $this->path . "/" . $filename;
    }
}