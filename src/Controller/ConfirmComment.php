<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Persistence\CommentTableRepo;
use App\Services\DbService;
use App\Services\TemplateRenderer;

class ConfirmComment implements ControllerInterface
{
    private CommentTableRepo $commentRepo;

    public function __construct(CommentTableRepo $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    public function handle()
    {
        $id = $_GET['id'];
        $output = $this->commentRepo->updateComment($id);

        header('location:newcomments?msg=confirmed');
    }
}