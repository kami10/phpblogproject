<?php

use App\Controller\AddComment;
use App\Controller\AddCommentFactory;
use App\Controller\AddNews;
use App\Controller\AddNewsFactory;
use App\Controller\Admin;
use App\Controller\AdminFactory;
use App\Controller\ConfirmComment;
use App\Controller\ConfirmCommentFactory;
use App\Controller\DeleteComment;
use App\Controller\DeleteCommentFactory;
use App\Controller\DeleteNews;
use App\Controller\DeleteNewsFactory;
use App\Controller\EditNews;
use App\Controller\EditNewsFactory;
use App\Controller\FullNews;
use App\Controller\FullNewsController;
use App\Controller\Home;
use App\Controller\HomeFactory;
use App\Controller\Login;
use App\Controller\LoginFactory;
use App\Controller\NewComments;
use App\Controller\NewCommentsFactory;
use App\Controller\UpdateNews;
use App\Controller\UpdateNewsFactory;
use App\Middleware\AuthenticationMiddleware;
use App\Middleware\AuthenticationMiddlewareFactory;
use App\Services\DbService;
use App\Services\DbServiceFactory;
use App\Services\TemplateRenderer;
use App\Services\TemplateRendererFactory;
use App\System\App;
use App\System\AppFactory;
use App\System\Router;
use App\System\RouterFactory;

$routes = include 'routes.php';

return [
        'factories' => [
            TemplateRenderer::class => TemplateRendererFactory::class,
            Home::class => HomeFactory::class,
            App::class => AppFactory::class,
            DbService::class => DbServiceFactory::class,
            Router::class => RouterFactory::class,
            Admin::class => AdminFactory::class,
            AuthenticationMiddleware::class => AuthenticationMiddlewareFactory::class,
            Login::class => LoginFactory::class,
            FullNews::class => FullNewsController::class,
            AddNews::class => AddNewsFactory::class,
            NewComments::class => NewCommentsFactory::class,
            ConfirmComment::class => ConfirmCommentFactory::class,
            DeleteComment::class => DeleteCommentFactory::class,
            DeleteNews::class => DeleteNewsFactory::class,
            EditNews::class => EditNewsFactory::class,
            AddComment::class => AddCommentFactory::class,
            UpdateNews::class => UpdateNewsFactory::class,
        ]
    ] + $routes;