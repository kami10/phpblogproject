<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Persistence\CommentTableRepo;
use App\Services\DbService;
use App\Services\TemplateRenderer;

class NewComments implements ControllerInterface
{
    private TemplateRenderer $templateRenderer;
    private CommentTableRepo $commentRepo;

    public function __construct(TemplateRenderer $templateRenderer, CommentTableRepo $commentRepo)
    {
        $this->templateRenderer = $templateRenderer;
        $this->commentRepo = $commentRepo;
    }

    public function handle()
    {
        $output = $this->commentRepo->newComments();
        $viewVariable = [
            'output' => $output,
        ];

        return $this->templateRenderer->render('newComments.php', $viewVariable);
    }
}