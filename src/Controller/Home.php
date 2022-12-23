<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\DbService;
use App\Services\Pagination;
use App\Services\TemplateRenderer;

class Home implements ControllerInterface
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
        // outputting the last 3 news in the home page(right column)
        $threeLatestNews = $this->dbService->threeLatestNews(0);

        // outputting the last 5 news based on user's url input
        $current = $_GET['page'] ?? 1;
        $newsBegin = ($current - 1) * 5;
        $fiveLatestNews = $this->dbService->fiveLatestNews($newsBegin);

        //Pagination
        $totalItems = current($this->pagination->newsCount());
        $itemCountPerPage = 5;
        $totalPageCount = (int)ceil(((int)$totalItems / $itemCountPerPage));
        $pages = $this->pagination->getAllPages($current, $totalPageCount);
        $nextPage = (($current < $totalPageCount) ? $current + 1 : $totalPageCount);
        $previousPage = (($current > 1) ? $current - 1 : 1);

        $viewVariable = [
            'error' => 'no more news found',
            'threeLatestNews' => $threeLatestNews,
            'fiveLatestNews' => $fiveLatestNews,
            'pages' => $pages,
            'current' => $current
        ];

        return $this->templateRenderer->render('home.php', $viewVariable);
    }
}