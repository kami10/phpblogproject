<?php

namespace App\Persistence;

use PDO;
use PDOException;

class LoginTableRepo
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function login()
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM tbl_login ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $key => $value) {
                return $value;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

}