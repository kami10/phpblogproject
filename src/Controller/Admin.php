<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\DbService;
use App\Services\Pagination;
use App\Services\TemplateRenderer;

class Admin implements ControllerInterface
{
    private TemplateRenderer $templateRenderer;
    private DbService $dbService;
    private Pagination $pagination;

    public function __construct(TemplateRenderer $templateRenderer, DbService $dbService, Pagination $pagination)
    {
        $this->templateRenderer = $templateRenderer;
        $this->dbService = $dbService;
        $this->pagination = $pagination;
    }

    public function handle()
    {
        // outputting the last 5 news based on user's url input
        $current = $_GET['page'] ?? 1;
        $newsBegin = ($current - 1) * 5;
        $fiveLatestNews = $this->dbService->fiveLatestNews($newsBegin);

        //Pagination
        $totalItems = current($this->pagination->newsCount());
        $itemCountPerPage = 5;
        $totalPageCount = (int)ceil(((int)$totalItems / $itemCountPerPage));

        $viewVariable = [
            'error' => 'no more news found',
            'fiveLatestNews' => $fiveLatestNews,
            'totalPageCount' => $totalPageCount,
            'current' => $current
        ];

        return $this->templateRenderer->render('admin.php', $viewVariable);
    }
}