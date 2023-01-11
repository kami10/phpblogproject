<?php

namespace App\Services;

use App\Model\PaginationResponse;
use App\Persistence\NewsTableRepository;

class Pagination
{
    private NewsTableRepository $newsRepo;

    public function __construct(NewsTableRepository $newsRepo)
    {
        $this->newsRepo = $newsRepo;
    }

    public function newsCount()
    {
        return $this->newsRepo->newsCount();
    }

    public function getThreeLatestNews()
    {
        $threeLatestNews = $this->newsRepo->threeLatestNews(0);
        $paginationResponse = new PaginationResponse;
        $paginationResponse->setThreeLatestNews($threeLatestNews);
        return $paginationResponse;
    }

    public function getFiveLatestNews(int $current)
    {
        $newsBegin = ($current - 1) * 5;
        $fiveLatestNews = $this->newsRepo->fiveLatestNews($newsBegin);
        $paginationResponse = new PaginationResponse;
        $paginationResponse->setFiveLatestNews($fiveLatestNews);
        return $paginationResponse;
    }

    public function totalPageCount(int $pageSize): PaginationResponse
    {
        $totalPageCount = (int)ceil((current($this->newsCount()) / $pageSize));
        return new PaginationResponse($totalPageCount);
    }
}