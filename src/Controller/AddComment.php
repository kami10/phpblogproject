<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\DbService;
use App\Services\TemplateRenderer;

class AddComment implements ControllerInterface
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nid = $_REQUEST['nid'];
            $name = $_REQUEST['name'];
            $comment = $_REQUEST['comment'];

            $output = $this->dbService->addComment($nid, $comment);
            $viewVariable = [
                'msg' => $output,
            ];

            return $this->templateRenderer->render('addCommentConfirm.php', $viewVariable);
        }
    }
}