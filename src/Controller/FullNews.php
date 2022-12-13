<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\DbService;
use App\Services\TemplateRenderer;

class FullNews implements ControllerInterface
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
        $id = $_GET['id'];
        $fullnews = $this->dbService->fullNews($id);
        $newsComments = $this->dbService->newsRelatedComments($id);

        $viewVariable = [
            'fullnews' => $fullnews,
            'newsComments' => $newsComments,
        ];

        return $this->templateRenderer->render('fullNews.php', $viewVariable);
    }
}