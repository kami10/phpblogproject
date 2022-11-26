<?php

namespace App\Middleware;

use App\Interfaces\MiddlewareInterface;

class AuthenticationMiddleware implements MiddlewareInterface
{
    public function process()
    {
        if (!$_SESSION) {
            header("location: " . 'login');
        }
    }
}