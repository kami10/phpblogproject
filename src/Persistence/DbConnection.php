<?php

namespace App\Persistence;

use PDO;

class DbConnection
{
    private PDO $conn;

    public function __construct(array $config)
    {
        $this->conn = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['username'], $config['password']);
    }

    public function getConnection()
    {
        return $this->conn;
    }
}