<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\DbService;
use App\Services\TemplateRenderer;

class Admin implements ControllerInterface
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
        $output = $this->dbService->allNews();

//        if ($_SERVER['REQUEST_URI'] !== '/admin') {
//            $msg = $_GET['msg'];
//            $output = $msg;
//        }


        return $this->templateRenderer->render('admin.php', $output);
    }
}