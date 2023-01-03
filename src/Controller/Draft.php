<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Persistence\NewsTableRepository;
use App\Services\DbService;
use App\Services\Pagination;
use App\Services\TemplateRenderer;

class Draft implements ControllerInterface
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
        $status = 0;
        $output = $this->newsRepo->allNews($status);
        $viewVariable = [
            'output' => $output,
        ];

        return $this->templateRenderer->render('draft.php', $viewVariable);
    }
}