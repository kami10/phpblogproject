<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\DbService;
use App\Services\Pagination;
use App\Services\TemplateRenderer;

class Draft implements ControllerInterface
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
        $status = 0;
        $output = $this->dbService->allNews($status);
        $viewVariable = [
            'output' => $output,
        ];

        return $this->templateRenderer->render('draft.php', $viewVariable);
    }
}