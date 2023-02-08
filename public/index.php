<?php

require "../vendor/autoload.php";

use PHPMin\Router;
use Symfony\Component\HttpFoundation\Response;

$router = new Router();

$router->addRoute('GET', '/', function()
{
    // Example using HttpFoundation\Request.
    $response = new Response("/ Route");
    $response->send();
});

$router->addRoute('GET|POST', '/login', function()
{
    dump("Login Route");
});

$router->addRoute('GET|POST', '/posts', function()
{
    dump("Post Route");
});

$router->addRoute('GET|POST', '/[a-z][0-9]', function()
{
    dump("Regex Pattern Route");
});

$router->addRoute('GET|POST', '/[0-9]{3}', function()
{
    dump("Regex Pattern Route With Numbers");
});

$router->run();
