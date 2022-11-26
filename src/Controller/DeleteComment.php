<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\DbService;
use App\Services\TemplateRenderer;

class DeleteComment implements ControllerInterface
{
    private DbService $dbService;
    private TemplateRenderer $templateRenderer;

    public function __construct(DbService $dbService, TemplateRenderer $templateRenderer)
    {
        $this->dbService = $dbService;
        $this->templateRenderer = $templateRenderer;
    }

    public function handle()
    {
        $id = $_GET['id'];
        $output = $this->dbService->deleteComment($id);

        $result = $this->dbService->newComments();
        $viewVariable = [
            'msg' => $output,
            $result,
        ];

        return header('newcomments', $viewVariable);
        // return $this->templateRenderer->render();
    }
}