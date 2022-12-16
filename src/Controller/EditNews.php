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
        $viewVariable = [
            'output' => [],
        ];

            $id = $_GET['id'];
            $output = $this->dbService->selectOneNews($id);
            if($output){
                $viewVariable['output'] = $output;
            }

        return $this->templateRenderer->render('editNews.php', $viewVariable);
    }
}