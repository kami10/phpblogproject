<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Persistence\CommentTableRepo;
use App\Persistence\NewsCategoryRepo;
use App\Persistence\NewsTableRepository;
use App\Services\RedisClient;
use App\Services\TemplateRenderer;
use PDO;

class FullNews implements ControllerInterface
{
    private TemplateRenderer $templateRenderer;
    private RedisClient $redisClient;
    private NewsTableRepository $newsRepo;
    private CommentTableRepo $commentRepo;
    private NewsCategoryRepo $newsCategoryRepo;

    public function __construct(TemplateRenderer $templateRenderer, NewsTableRepository $newsRepo, CommentTableRepo $commentRepo, NewsCategoryRepo $newsCategoryRepo, RedisClient $redisClient)
    {
        $this->templateRenderer = $templateRenderer;
        $this->redisClient = $redisClient;
        $this->newsRepo = $newsRepo;
        $this->commentRepo = $commentRepo;
        $this->newsCategoryRepo = $newsCategoryRepo;
    }

    public function modify(array $news)
    {
        $news['long_news'] = htmlspecialchars_decode($news['long_news']);
        return $news;
    }

    public function handle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nid = $_REQUEST['nid'];
            $name = $_REQUEST['name'];
            $comment = $_REQUEST['comment'];
            $output = $this->commentRepo->addComment($nid, $comment);

            $fullNews = $this->newsRepo->fullNews($nid);
            $modifiedArray = $this->modify($fullNews);
            $newsComments = $this->commentRepo->newsRelatedComments($nid);
            $newsCategories = $this->newsCategoryRepo->getNewsCategories($nid);
        } else {
            $id = $_GET['id'] ?? '';
            // $cachedEntry = $this->redisClient->get('title');

//        if ($cachedEntry) {
//            //display redis key's value from cache not db, fetch whole news data from db,time checking for returning data
//            //time in mil seconds(1000)
//            $t1 = microtime(true) * 1000;
//            $newsTitle = 'From Redis: ' . $cachedEntry;
//            $t2 = microtime(true) * 1000;
//            echo 'time taken from cache: ' . round($t2 - $t1, 4);
            $fullNews = $this->newsRepo->fullNews($id);
            $modifiedArray = $this->modify($fullNews);
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

            $newsComments = $this->commentRepo->newsRelatedComments($id);
            $newsCategories = $this->newsCategoryRepo->getNewsCategories($id);
            $newsAuthor = $this->newsRepo->getNewsAuthor($id);
        }
        $viewVariable = [
            'fullNews' => $modifiedArray ?? [],
            'newsTitle' => $newsTitle ?? '',
            'newsComments' => $newsComments ?? [],
            'newsCategories' => $newsCategories ?? [],
            'newsAuthor' => $newsAuthor ?? [],
        ];

        return $this->templateRenderer->render('fullNews.php', $viewVariable);
    }
}