<?php

namespace App\Services;

class Pagination
{
    private DbService $dbService;

    public function __construct(DbService $dbService)
    {
        $this->dbService = $dbService;
    }

    public function newsCount()
    {
      return $this->dbService->newsCount();
    }

    public function getAllPages(int $current, int $max)
    {
        $output = [];
        for ($i = $current - 2; $i < $current; $i++) {
            if ($i < 1) {
                continue;
            }
            $output = $i;
        }
        for ($i = $current; $i < $current + 3; $i++) {
            if ($i > $max) {
                break;
            }
            $output = $i;
        }
        return $output;
    }
}