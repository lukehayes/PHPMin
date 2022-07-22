<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use PHPMin\Request;

final class RequestTest extends TestCase
{
    public function testCanGetHomeRoute(): void
    {
		$router = new Request();
        $this->assertEqual($router->getUri(), "/");
    }

    public function testCanGetRequestUri(): void
    {
		$router = new Request();
        $this->assertString($router->getUri(), "/");
    }
}
