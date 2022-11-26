<?php

namespace App\Services;

class TemplateRenderer
{
    public function render($filename, array $viewVariable)
    {
        include __DIR__ . '/../Templates/' . $filename;
    }
}