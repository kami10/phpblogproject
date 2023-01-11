<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Persistence\LoginTableRepo;
use App\Services\DbService;
use App\Services\TemplateRenderer;
use App\System\ServiceManager;

class Login implements ControllerInterface
{
    private TemplateRenderer $templateRenderer;
    private LoginTableRepo $loginRepo;

    public function __construct(TemplateRenderer $templateRenderer, LoginTableRepo $loginRepo)
    {
        $this->templateRenderer = $templateRenderer;
        $this->loginRepo = $loginRepo;
    }

    public function handle()
    {
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $db = $this->loginRepo->login();
            foreach ($db as $item => $value) {
                if ($username === $value['username'] && $password === $value['password']) {
                    $_SESSION['role'] = $value['role'];
                    header("location: " . 'admin');
                } else {
                    echo 'login failed';
                }
            }
        }

        $viewVariable = [];
        return $this->templateRenderer->render('login.html', $viewVariable);
    }
}