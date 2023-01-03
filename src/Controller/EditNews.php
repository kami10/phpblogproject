<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Persistence\NewsTableRepository;
use App\Services\DbService;
use App\Services\TemplateRenderer;

class EditNews implements ControllerInterface
{
    private TemplateRenderer $templateRenderer;
    private NewsTableRepository $newsRepo;

    public function __construct(TemplateRenderer $templateRenderer, NewsTableRepository $newsRepo)
    {
        $this->templateRenderer = $templateRenderer;
        $this->newsRepo = $newsRepo;
    }

    public function modify(array $news)
    {
        $news['long_news'] = htmlspecialchars_decode($news['long_news']);
        return $news;
    }

    public function handle()
    {
        $id = $_GET['id'];
        $output = $this->newsRepo->selectOneNews($id);
        $modifiedArray = $this->modify($output);

        $viewVariable = [
            'output' => $modifiedArray,
        ];


        return $this->templateRenderer->render('editNews.php', $viewVariable);
    }
}