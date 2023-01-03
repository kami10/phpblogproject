<?php

use App\Controller\AddComment;
use App\Controller\AddCommentFactory;
use App\Controller\AddNews;
use App\Controller\AddNewsFactory;
use App\Controller\Admin;
use App\Controller\AdminFactory;
use App\Controller\ApiResponse;
use App\Controller\ApiResponseFactory;
use App\Controller\ConfirmComment;
use App\Controller\ConfirmCommentFactory;
use App\Controller\Dashboard;
use App\Controller\DashboardFactory;
use App\Controller\DeleteComment;
use App\Controller\DeleteCommentFactory;
use App\Controller\DeleteNews;
use App\Controller\DeleteNewsFactory;
use App\Controller\Draft;
use App\Controller\DraftFactory;
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
use App\Controller\SubCategories;
use App\Controller\SubCategoriesFactory;
use App\Controller\UpdateNews;
use App\Controller\UpdateNewsFactory;
use App\Middleware\AuthenticationMiddleware;
use App\Middleware\AuthenticationMiddlewareFactory;
use App\Persistence\CommentTableRepo;
use App\Persistence\CommentTableRepoFactory;
use App\Persistence\DbConnection;
use App\Persistence\DbConnectionFactory;
use App\Persistence\LoginTableRepo;
use App\Persistence\LoginTableRepoFactory;
use App\Persistence\NewsCategoryRepo;
use App\Persistence\NewsCategoryRepoFactory;
use App\Persistence\NewsTableRepository;
use App\Persistence\NewsTableRepositoryFactory;
use App\Persistence\SettingTableRepo;
use App\Persistence\SettingTableRepoFactory;
use App\Services\DbService;
use App\Services\DbServiceFactory;
use App\Services\Pagination;
use App\Services\PaginationFactory;
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
            UpdateNews::class => UpdateNewsFactory::class,
            DbConnection::class => DbConnectionFactory::class,
            ApiResponse::class => ApiResponseFactory::class,
            Pagination::class => PaginationFactory::class,
            Dashboard::class => DashboardFactory::class,
            Draft::class => DraftFactory::class,
            NewsTableRepository::class => NewsTableRepositoryFactory::class,
            CommentTableRepo::class => CommentTableRepoFactory::class,
            LoginTableRepo::class => LoginTableRepoFactory::class,
            NewsCategoryRepo::class => NewsCategoryRepoFactory::class,
            SettingTableRepo::class => SettingTableRepoFactory::class,
        ],
        'database' => [
            'host' => 'localhost',
            'username' => 'root',
            'password' => 'root',
            'dbname' => 'phpblog_db'
        ],
    ] + $routes;