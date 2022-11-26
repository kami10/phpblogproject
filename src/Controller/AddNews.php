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
            $image = $_REQUEST['image'];
            $shortNews = $_REQUEST['shortNews'];
            $longNews = $_REQUEST['longNews'];

            $output = $this->dbService->addNews($title, $image, $shortNews, $longNews);
        }

        $viewVariable = [
            'msg' => $output
        ];
        return $this->templateRenderer->render('addNews.html', $viewVariable);
    }
}