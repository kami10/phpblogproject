<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\DbService;
use App\Services\TemplateRenderer;

class AddNews implements ControllerInterface
{
    private TemplateRenderer $templateRenderer;
    private DbService $dbService;

    public function __construct(TemplateRenderer $templateRenderer, DbService $dbService)
    {
        $this->templateRenderer = $templateRenderer;
        $this->dbService = $dbService;
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
            $categories = $_POST['categories'];
            if ($_POST['action'] === 'Publish') {
                $status = 1;
            } elseif ($_POST['action'] === 'Save Draft') {
                $status = 0;
            }

            $output = $this->dbService->addNews($title, $created, $filename, $shortNews, $longNews, $status);
            $addCategories = $this->dbService->addNewsCategory($output, $categories);
        }

        return $this->templateRenderer->render('addNews.html');
    }
}