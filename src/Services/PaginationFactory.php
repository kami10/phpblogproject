<?php

namespace App\Services;

use App\Interfaces\FactoryInterface;
use App\Persistence\NewsTableRepository;
use App\System\ServiceManager;

class PaginationFactory implements FactoryInterface
{

    public function __invoke(ServiceManager $serviceManager)
    {
        return new Pagination($serviceManager->get(NewsTableRepository::class));
    }
}