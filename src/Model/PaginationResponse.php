<?php

namespace App\Model;

class PaginationResponse
{
    private int $totalPageCount;
    private array $fiveLatestNews = [];
    private array $threeLatestNews = [];

    public function __construct(int $totalPageCount = 0)
    {
        $this->totalPageCount = $totalPageCount;
    }

    public function getTotalPageCount(): int
    {
        return $this->totalPageCount;
    }

    public function setThreeLatestNews(array $threeLatestNews): void
    {
        $this->threeLatestNews = $threeLatestNews;
    }

    public function getThreeLatestNews(): array
    {
        return $this->threeLatestNews;
    }

    public function setFiveLatestNews(array $fiveLatestNews): void
    {
        $this->fiveLatestNews = $fiveLatestNews;
    }

    public function getFiveLatestNews(): array
    {
        return $this->fiveLatestNews;
    }


}