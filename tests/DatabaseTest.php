<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use PHPMin\DB\Database;

final class DatabaseTest extends TestCase
{
    private $db;

    public function setUp() : void
    {
        $this->db = new Database();
    }

    public function testConnectionReturnsPDO()
    {
        $this->assertInstanceOf(PDO::class, $this->db->connect());
    }

    public function testGetConnection()
    {
        $this->assertInstanceOf(PDO::class, $this->db->getConnection());
    }
}

