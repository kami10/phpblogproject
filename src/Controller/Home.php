<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\DbService;
use App\Services\TemplateRenderer;

class Home implements ControllerInterface
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
        //$newsCount = $this->dbService->newsCount()['count(nid)'];
        $latestNews = $this->dbService->latestNews(0);
        $output = $this->dbService->allNews();
        $viewVariable = [
            'latestNews' => $latestNews,
            'output' => $output,
        ];

        return $this->templateRenderer->render('home.php', $viewVariable);
    }
}