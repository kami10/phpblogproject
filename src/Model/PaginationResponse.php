<?php

namespace App\Model;

class PaginationResponse
{
    private int $totalPageCount = 0;

    public function __construct(int $totalPageCount)
    {
        $this->totalPageCount = $totalPageCount;
    }

    public function getTotalPageCount(): int
    {
        return $this->totalPageCount;
    }

}