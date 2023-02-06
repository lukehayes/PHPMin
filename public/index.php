<?php

require "../vendor/autoload.php";

//------------------------------------------------------------------------------
//  DI Container
//------------------------------------------------------------------------------
$builder = new DI\ContainerBuilder();
$builder->addDefinitions(['router' => new PHPMin\Router ]);
$container = $builder->build();

$router = $container->get('router');
$r = $container->get('router');

$f = DI\create('PHPMin\Router')->constructor();

dump($f);
dump($container->get('router'));

dump($container);






//------------------------------------------------------------------------------
//  Routes
//------------------------------------------------------------------------------
$router->addRoute('GET', '/', function()
{
    dump("Home Route");
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

$router->addRoute('GET|POST', '/[a-z][0-9]+', function()
{
    dump("Quick Test");
});

$router->run();

