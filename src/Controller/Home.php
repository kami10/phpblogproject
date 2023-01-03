<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Persistence\NewsTableRepository;
use App\Services\DbService;
use App\Services\Pagination;
use App\Services\TemplateRenderer;

class Home implements ControllerInterface
{
    private TemplateRenderer $templateRenderer;
    private Pagination $pagination;
    private NewsTableRepository $newsRepo;

    public function __construct(TemplateRenderer $templateRenderer, NewsTableRepository $newsRepo, Pagination $pagination)
    {
        $this->templateRenderer = $templateRenderer;
        $this->pagination = $pagination;
        $this->newsRepo = $newsRepo;
    }

    public function handle()
    {
        // outputting the last 3 news in the home page(right column)
        $threeLatestNews = $this->newsRepo->threeLatestNews(0);

        // outputting the last 5 news based on user's url input
        $current = $_GET['page'] ?? 1;
        $newsBegin = ($current - 1) * 5;
        $fiveLatestNews = $this->newsRepo->fiveLatestNews($newsBegin);

        //Pagination
        $totalItems = current($this->pagination->newsCount());
        $itemCountPerPage = 5;
        $totalPageCount = (int)ceil(((int)$totalItems / $itemCountPerPage));

        $viewVariable = [
            'error' => 'no more news found',
            'threeLatestNews' => $threeLatestNews,
            'fiveLatestNews' => $fiveLatestNews,
            'totalPageCount' => $totalPageCount,
            'current' => $current
        ];

        return $this->templateRenderer->render('home.php', $viewVariable);
    }
}