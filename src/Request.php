<?php
namespace PHPMin;

class Request
{
    public function uri()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }
}
