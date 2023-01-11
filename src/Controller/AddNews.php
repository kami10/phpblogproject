<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Persistence\LoginTableRepo;
use App\Persistence\NewsCategoryRepo;
use App\Persistence\NewsTableRepository;
use App\Services\TemplateRenderer;
use MongoDB\Driver\Session;

class AddNews implements ControllerInterface
{
    private TemplateRenderer $templateRenderer;
    private NewsTableRepository $newsRepo;
    private NewsCategoryRepo $newsCategoryRepo;
    private LoginTableRepo $loginRepo;

    public function __construct(TemplateRenderer $templateRenderer, NewsTableRepository $newsRepo, NewsCategoryRepo $newsCategoryRepo, LoginTableRepo $loginRepo)
    {
        $this->templateRenderer = $templateRenderer;
        $this->newsRepo = $newsRepo;
        $this->newsCategoryRepo = $newsCategoryRepo;
        $this->loginRepo = $loginRepo;
    }

    public function handle()
    {
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $title = $_REQUEST['title'];
            $created = $_REQUEST['date'];
            $image = $_FILES['image'];
            $filename = '/assets/img/' . md5((string)time()) . '.jpg';
            move_uploaded_file($image['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $filename);
            $shortNews = $_REQUEST['shortNews'];
            $longNews = $_REQUEST['longNews'];
            $longNews = htmlspecialchars($longNews);
            $categories = $_POST['categories'];
            if ($_POST['action'] === 'Publish') {
                $status = 1;
            } elseif ($_POST['action'] === 'Save Draft') {
                $status = 0;
            }
            $id = (int)$this->loginRepo->getId($_SESSION['role']);
            $news_id = $this->newsRepo->addNews($title, $created, $filename, $shortNews, $longNews, $status);
            $addCategories = $this->newsCategoryRepo->addNewsCategory($news_id, $categories);
            $addNewsAuthor = $this->newsRepo->addNewsAuthor($id, $news_id);
        } else {
            $categories = $this->newsCategoryRepo->getCategories();
        }

        $viewVariable = [
            'categories' => $categories,
        ];

        return $this->templateRenderer->render('addNews.php', $viewVariable);
    }
}