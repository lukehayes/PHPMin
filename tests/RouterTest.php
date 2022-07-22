<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use PHPMin\Router;

final class RouterTest extends TestCase
{
    public function testCanSplitRequestMethods(): void
    {
		$router = new Router();

		$this->assertEqual(
			$router->defineRoutes("GET|POST|PATCH"), 
			["GET", "POST", "PATCH"]);
    }
}
