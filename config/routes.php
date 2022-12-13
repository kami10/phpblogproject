<?php

use App\Controller\AddComment;
use App\Controller\AddNews;
use App\Controller\Admin;
use App\Controller\ConfirmComment;
use App\Controller\DeleteComment;
use App\Controller\DeleteNews;
use App\Controller\EditNews;
use App\Controller\FullNews;
use App\Controller\Home;
use App\Controller\Login;
use App\Controller\NewComments;
use App\Middleware\AuthenticationMiddleware;

return [
    'routes' => [
        'home' => Home::class,
        'admin' => [
            AuthenticationMiddleware::class,
            Admin::class
        ],
        'login' => Login::class,
        'fullnews' => FullNews::class,
        'addnews' => AddNews::class,
        'newcomments' => NewComments::class,
        'deletecomment' => DeleteComment::class,
        'confirmcomment' => ConfirmComment::class,
        'deletenews' => DeleteNews::class,
        'editnews' => EditNews::class,
        'addcomment' => AddComment::class,
    ]
];