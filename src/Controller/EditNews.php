<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\DbService;
use App\Services\TemplateRenderer;

class EditNews implements ControllerInterface
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
            $nid = $_REQUEST['nid'];
            $title = $_REQUEST['title'];
            $created = $_REQUEST['date'];
            $image = $_FILES['image'];
            $filename = '/assets/img/' . md5((string)time()) . '.jpg';
            move_uploaded_file($image['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $filename);
            $shortNews = $_REQUEST['shortNews'];
            $longNews = $_REQUEST['longNews'];

            $output = $this->dbService->updateNews($nid, $title, $created, $filename, $shortNews, $longNews);
            var_dump($output);die;
        }

        $id = $_GET['id'];
        $news = $this->dbService->selectOneNews($id);


        return $this->templateRenderer->render('editNews.php', $news);
    }
}