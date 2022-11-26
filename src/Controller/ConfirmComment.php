<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\DbService;
use App\Services\TemplateRenderer;

class ConfirmComment implements ControllerInterface
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
        $id = $_GET['id'];
        $output = $this->dbService->updateComment($id);

        $result = $this->dbService->newComments();

        $viewVariable = [
            'msg' => $output,
            $result,
        ];

       return header('newcomments', $viewVariable);
    }
}