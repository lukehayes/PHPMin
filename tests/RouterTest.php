<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use PHPMin\Router;

final class RouterTest extends TestCase
{
    public function testCanGetHomeRoute(): void
    {
		$router = new Router();
        $this->assertEqual($router->getUri(), "/");
    }

    public function testCanGetRequestUri(): void
    {
		$router = new Router();
        $this->assertString($router->getUri(), "/");
    }
}
