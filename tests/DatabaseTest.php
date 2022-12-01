<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use PHPMin\DB\Database;
use PHPMin\DB\SQLiteDatabase;

final class DatabaseTest extends TestCase
{
    private $sqliteDB = NULL;

    public function setUp() : void
    {
        $this->sqliteDB = new SQLiteDatabase();
    }

    public function testConnectionReturnsPDO() : void
    {
        $this->assertInstanceOf(\PDO::class, $this->sqliteDB->getConnection());
    }
}

