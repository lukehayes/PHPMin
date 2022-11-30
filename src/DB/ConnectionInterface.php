<?php
namespace PHPMin\DB;

interface ConnectionInterface
{
    /**
     * Connection getter.
     *
     * @return PDO
     */
    public function getConnection() : \PDO;
}

