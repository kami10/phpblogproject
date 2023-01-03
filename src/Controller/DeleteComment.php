<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Persistence\CommentTableRepo;
use App\Services\DbService;
use App\Services\TemplateRenderer;

class DeleteComment implements ControllerInterface
{
    private CommentTableRepo $commentRepo;

    public function __construct(CommentTableRepo $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    public function handle()
    {
        $id = $_GET['id'];
        $output = $this->commentRepo->deleteComment($id);

        return header('location:newcomments?msg=Successfully deleted.');
        // return $this->templateRenderer->render();
    }
}