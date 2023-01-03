<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Persistence\CommentTableRepo;
use App\Persistence\NewsTableRepository;
use App\Services\DbService;
use App\Services\TemplateRenderer;
use App\System\ServiceManager;

class DeleteCommentFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        $newsRepo = $serviceManager->get(CommentTableRepo::class);

        return new DeleteComment($newsRepo);
    }
}