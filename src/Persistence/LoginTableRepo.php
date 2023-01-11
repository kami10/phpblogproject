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
            $output = [];
            foreach ($stmt->fetchAll() as $key => $value) {
                $output[$key] = $value;
            }
            return $output;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getId(string $role)
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT id FROM tbl_login WHERE role = '$role' ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return current($stmt->fetchAll());
        } catch (PDOException $e) {
            return false;
        }
    }


//    public function getNewsAuther(int $id)
//    {
//        try {
//            // set the PDO error mode to exception
//            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            $sql = "SELECT role FROM news_category inner join tbl_category where news_id = '$id' and cat_id = tbl_category.id";
//            $stmt = $this->conn->prepare($sql);
//            $stmt->execute();
//            $stmt->setFetchMode(PDO::FETCH_ASSOC);
//            $output = [];
//            foreach ($stmt->fetchAll() as $key => $value) {
//                $output[$key] = $value;
//            }
//            return $output;
//
//        } catch (PDOException $e) {
//            return false;
//        }
//    }

}