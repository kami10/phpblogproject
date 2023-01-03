<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Persistence\NewsTableRepository;
use App\Services\DbService;
use App\Services\TemplateRenderer;

class DeleteNews implements ControllerInterface
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
        $id = $_GET['id'];
        $output = $this->newsRepo->deleteNews($id);

        header('location:admin?msg=successfully deleted.');
    }
}