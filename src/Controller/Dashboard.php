<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\DbService;
use App\Services\TemplateRenderer;

class Dashboard implements ControllerInterface
{
    private TemplateRenderer $templateRenderer;
    private DbService $dbService;

    public function __construct(TemplateRenderer $templateRenderer, DbService $dbService)
    {
        $this->templateRenderer = $templateRenderer;
        $this->dbService = $dbService;
    }

    public function handle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $value = $_GET['subject'] ?? 'blue';
            $this->dbService->addSetting('template', $value);
        }

        return $this->templateRenderer->render('dashboard.php');
    }
}