<?php

require "../vendor/autoload.php";

use PHPMin\Router;

$rt = new Router();

//$rt->addRoute('GET', '/', function()
//{
	//dump("Home Route");
//});

$rt->addRoute('GET|POST', '/login/', function()
{
	dump("Login Route");
});

$rt->addRoute('GET|POST', '/[a-z][0-9]$', function()
{
	dump("Regex Pattern Route");
});

$rt->addRoute('GET|POST', '/^[0-9]{3}$', function()
{
	dump("Regex Pattern Route With Numbers");
});

$rt->addRoute('GET', '/dashboard', "DashboardController@index");

$rt->matchRoute();
