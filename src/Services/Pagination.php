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

    public function totalNewsCount(int $pageSize): PaginationResponse
    {
        return new PaginationResponse((int)ceil(((int)$this->newsCount() / $pageSize)));
    }
}