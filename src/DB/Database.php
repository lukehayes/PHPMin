<?php
namespace PHPMin\DB;

use PHPMin\DB\ConnectionInterface;

abstract class Database
{
    protected ?\PDO $connection = NULL;

    /**
     * Connection getter.
     *
     * @return PDO
     */
    abstract public function getConnection() : \PDO;
}
