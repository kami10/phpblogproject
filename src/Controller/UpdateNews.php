<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Persistence\NewsTableRepository;
use App\Services\DbService;
use App\Services\TemplateRenderer;

class UpdateNews implements ControllerInterface
{
    private TemplateRenderer $templateRenderer;
    private NewsTableRepository $newsRepo;

    public function __construct(TemplateRenderer $templateRenderer, NewsTableRepository $newsRepo)
    {
        $this->templateRenderer = $templateRenderer;
        $this->newsRepo = $newsRepo;
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
            if ($_POST['action'] === 'Publish') {
                $status = 1;
            } elseif ($_POST['action'] === 'Save Draft') {
                $status = 0;
            }

            $output = $this->newsRepo->updateNews($nid, $title, $created, $filename, $shortNews, $longNews, $status);
        }

        return $this->templateRenderer->render('updateNews.html');
    }
}