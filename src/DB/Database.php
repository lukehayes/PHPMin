<?php
namespace PHPMin\DB;

use PHPMin\DB\ConnectionInterface;

class Database implements ConnectionInterface
{
    private \PDO $connection;

    public function __construct()
    {
        $this->connection = $this->connect();
    }

    public function connect() : \PDO
    {
        return new \PDO("sqlite::memory:");
    }

    public function getConnection() : \PDO
    {
        return $this->connection;
    }
}
