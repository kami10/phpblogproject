<?php

namespace App\Model;

class HomeModelView
{
    private array $threeLatestNews;
    private array $fiveLatestNews;
    private int $totalPageCount;
    private int $current;
    private string $error = 'no more news found';

    public function __construct($threeLatestNews = [], $fiveLatestNews = [], $totalPageCount = 0, $current = 1)
    {
        $this->threeLatestNews = $threeLatestNews;
        $this->fiveLatestNews = $fiveLatestNews;
        $this->totalPageCount = $totalPageCount;
        $this->current = $current;
    }

    public function getThreeLatestNews(): array
    {
        return $this->threeLatestNews;
    }

    public function getFiveLatestNews(): array
    {
        return $this->fiveLatestNews;
    }

    public function getTotalPageCount(): int
    {
        return $this->totalPageCount;
    }

    public function getCurrent(): int
    {
        return $this->current;
    }

    public function getError(): string
    {
        return $this->error;
    }
}