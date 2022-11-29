<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPMin\Request;

final class RequestTest extends TestCase
{
    private $request;

    protected function setUp() : void
    {
        $this->request = new Request();
    }

    public function testCanGetRequestUri(): void
    {
        $this->assertEquals($this->request->uri(), "/");
    }
}
