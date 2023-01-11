<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Model\HomeModelView;
use App\Services\Pagination;
use App\Services\TemplateRenderer;

class Home implements ControllerInterface
{
    private TemplateRenderer $templateRenderer;
    private Pagination $pagination;

    public function __construct(TemplateRenderer $templateRenderer, Pagination $pagination)
    {
        $this->templateRenderer = $templateRenderer;
        $this->pagination = $pagination;
    }

    public function handle()
    {
        // outputting the last 3 news in the home page(right column)
        $threeLatestNews = $this->pagination->getThreeLatestNews()->getThreeLatestNews();

        // outputting the last 5 news based on user's url input
        $current = $_GET['page'] ?? 1;
        $fiveLatestNews = $this->pagination->getFiveLatestNews($current)->getFiveLatestNews();

        //Pagination
        $itemCountPerPage = 5;
        $totalPageCount = $this->pagination->totalPageCount($itemCountPerPage)->getTotalPageCount();

        $viewVariable = [
            'error' => 'no more news found',
            'threeLatestNews' => $threeLatestNews,
            'fiveLatestNews' => $fiveLatestNews,
            'totalPageCount' => $totalPageCount,
            'current' => $current
        ];

        //$viewModel = new HomeModelView($threeLatestNews, $fiveLatestNews, $totalPageCount, $current);

        return $this->templateRenderer->render('home.php', $viewVariable);
    }
}