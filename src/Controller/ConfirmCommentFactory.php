<?php

namespace App\Controller;

use App\Interfaces\FactoryInterface;
use App\Persistence\CommentTableRepo;
use App\Persistence\NewsTableRepository;
use App\Services\DbService;
use App\Services\TemplateRenderer;
use App\System\ServiceManager;

class ConfirmCommentFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        $commentRepo = $serviceManager->get(CommentTableRepo::class);

        return new ConfirmComment($commentRepo);
    }
}