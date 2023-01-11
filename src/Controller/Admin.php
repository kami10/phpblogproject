<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\Pagination;
use App\Services\TemplateRenderer;

class Admin implements ControllerInterface
{
    private TemplateRenderer $templateRenderer;
    private Pagination $pagination;

    public function __construct(TemplateRenderer $templateRenderer, Pagination $pagination)
    {
        $this->templateRenderer = $templateRenderer;
        $this->pagination = $pagination;
    }

    public function modify(array $news)
    {
        foreach ($news as &$value) {
            $value['long_news'] = htmlspecialchars_decode($value['long_news']);
        }
        return $news;
    }

    public function handle()
    {
        // outputting the last 5 news based on user's url input
        $current = $_GET['page'] ?? 1;
        $fiveLatestNews = $this->pagination->getFiveLatestNews($current)->getFiveLatestNews();

        //Pagination
        $itemCountPerPage = 5;
        $totalPageCount = $this->pagination->totalPageCount($itemCountPerPage)->getTotalPageCount();

        $viewVariable = [
            'error' => 'no more news found',
            'fiveLatestNews' => $fiveLatestNews,
            'totalPageCount' => $totalPageCount,
            'current' => $current,
            'role' => $_SESSION['role'],
        ];

        //$viewVariable = new AdminPageViewModel();

        return $this->templateRenderer->render('admin.php', $viewVariable);
    }
}