# PHPMin

Simple, minimal PHP components that can be used to build ideas rapidly.

*This is a personal project and I plan it to consist of classes or components
that I would find useful when building a quick MVP idea in PHP.*

---

## Components

### Router

`PHPMin\Router` is a basic HTTP router that can be used to define routes and
have an appropriate callback function or class method called as a result.

### Usage


Make sure to require autoload.php first:

```php
<?php

require "vendor/autoload.php";

$router = new PHPMin\Router();
```


### Defining Routes

PHPMin\Router::addRoute() accents three arguments:

* A string of request methods sperated by a `|` character
* The route endpoint
* An anonymous function or a string in the format of "controller@action" e.g. "DashboardController@index"

#### Examples

```php
<?php

// Simple GET request to the home page.
$router->addRoute("GET", "/", function() {
	
	echo "Hello, / route applies to a GET request.";

});

// Route showing how to apply multiple methods to a route.
$router->addRoute("GET|POST", "/login", function() {
	
	echo "Login method applies to GET or POST requests.";

});

// Call a pre-defined controller "DashboardController" and its action "index".
$router->addRoute("GET|POST", "/dashboard", "DashboardController@index");


// Regex defined route.
$router->addRoute("GET|POST", "/[a-z][0-9]", "DashboardController@index");

```

The basic idea is there, but needs much more work!


