<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\DbService;
use App\Services\RedisClient;
use App\Services\TemplateRenderer;

class FullNews implements ControllerInterface
{
    private TemplateRenderer $templateRenderer;
    private DbService $dbService;
    private RedisClient $redisClient;

    public function __construct(TemplateRenderer $templateRenderer, DbService $dbService, RedisClient $redisClient)
    {
        $this->templateRenderer = $templateRenderer;
        $this->dbService = $dbService;
        $this->redisClient = $redisClient;
    }

    public function handle()
    {
        $id = $_GET['id'] ?? '';
        // $cachedEntry = $this->redisClient->get('title');

//        if ($cachedEntry) {
//            //display redis key's value from cache not db, fetch whole news data from db,time checking for returning data
//            //time in mil seconds(1000)
//            $t1 = microtime(true) * 1000;
//            $newsTitle = 'From Redis: ' . $cachedEntry;
//            $t2 = microtime(true) * 1000;
//            echo 'time taken from cache: ' . round($t2 - $t1, 4);
        $fullNews = $this->dbService->fullNews($id);
//        } else {
//            //fetch data from db, cache title's value into Redis, put expiration time for redis key,read key's value from redis
//            $t1 = microtime(true) * 1000;
//            $fullNews = $this->dbService->fullNews($id);
//            $t2 = microtime(true) * 1000;
//            echo 'time taken from db: ' . round($t2 - $t1, 4);
//            $this->redisClient->set('title', $fullNews['title']);
//            $this->redisClient->expire('title', 10);
//            $cachedEntry = $this->redisClient->get('title');
//            $newsTitle = 'From DB: ' . $cachedEntry;
//        }

        $newsComments = $this->dbService->newsRelatedComments($id);
        $newsCategories = $this->dbService->getNewsCategories($id);

        $viewVariable = [
            'fullNews' => $fullNews ?? [],
            'newsTitle' => $newsTitle ?? '',
            'newsComments' => $newsComments ?? [],
            'newsCategories' => $newsCategories ?? [],
        ];

        return $this->templateRenderer->render('fullNews.php', $viewVariable);
    }
}