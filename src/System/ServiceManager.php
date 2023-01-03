<?php

namespace App\System;

use App\Interfaces\FactoryInterface;
use App\Interfaces\MiddlewareInterface;

class ServiceManager
{
    private array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function get($class)
    {
        if ($class === 'config') {
            return $this->config;
        }

        $factories = $this->config['factories'];
        $factory = new $factories[$class];
        if ($factory instanceof FactoryInterface) {
            return $factory($this);
            var_dump('f');die;
        }

        throw new \Exception('Factory not found');
    }
}