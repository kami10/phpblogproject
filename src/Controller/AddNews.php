<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Persistence\NewsCategoryRepo;
use App\Persistence\NewsTableRepository;
use App\Services\DbService;
use App\Services\TemplateRenderer;

class AddNews implements ControllerInterface
{
    private TemplateRenderer $templateRenderer;
    private NewsTableRepository $newsRepo;
    private NewsCategoryRepo $newsCategoryRepo;

    public function __construct(TemplateRenderer $templateRenderer, NewsTableRepository $newsRepo, NewsCategoryRepo $newsCategoryRepo)
    {
        $this->templateRenderer = $templateRenderer;
        $this->newsRepo = $newsRepo;
        $this->newsCategoryRepo = $newsCategoryRepo;
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

            $output = $this->newsRepo->addNews($title, $created, $filename, $shortNews, $longNews, $status);
            $addCategories = $this->newsCategoryRepo->addNewsCategory($output, $categories);
        } else {
            $categories = $this->newsCategoryRepo->getCategories();
        }

        $viewVariable = [
            'categories' => $categories,
        ];

        return $this->templateRenderer->render('addNews.php', $viewVariable);
    }
}