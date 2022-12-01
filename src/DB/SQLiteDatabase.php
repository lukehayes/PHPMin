<?php

namespace PHPMin\DB;

use PHPMin\DB\Database;
use PDO;

class SQLiteDatabase extends Database
{
    /**
     * Constructor
     *
     * @param string $databaseName    The name of the database. Defaults to "test".
     */
    public function __construct(string $databaseName = "test")
    {
        $this->connection = new PDO(
            "sqlite: {$databaseName}.db"
        );

        $this->connection->setAttribute(
            PDO::ATTR_DEFAULT_FETCH_MODE,
            PDO::FETCH_OBJ
        );
    }

    /**
     * Connection getter.
     *
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }
}
