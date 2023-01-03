<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Persistence\NewsTableRepository;
use App\Services\DbService;
use App\Services\Pagination;
use App\Services\TemplateRenderer;

class Admin implements ControllerInterface
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
        $newsBegin = ($current - 1) * 5;
        $fiveLatestNews = $this->newsRepo->fiveLatestNews($newsBegin);
        $modifiedArray = $this->modify($fiveLatestNews);


        //Pagination
        $itemCountPerPage = 5;
        $paginationResponse = $this->pagination->totalNewsCount($itemCountPerPage);

//        $viewVariable = [
//            'error' => 'no more news found',
//            'fiveLatestNews' => $modifiedArray,
//            'totalPageCount' => $paginationResponse,
//            'current' => $current
//        ];

        //$viewVariable = new AdminPageViewModel();

        return $this->templateRenderer->render('admin.php');
    }
}