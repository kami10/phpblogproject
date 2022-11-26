<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\DbService;
use App\Services\TemplateRenderer;
use App\System\ServiceManager;

class Login implements ControllerInterface
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
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $db = $this->dbService->checkLogin();
            if ($username === $db['username'] && $password === $db['password']) {
                $_SESSION['username'] = $username;
                header("location: " . 'admin');
            } else {
                echo 'login failed';
            }
        }

        $viewVariable = [];
        return $this->templateRenderer->render('login.html', $viewVariable);
    }
}