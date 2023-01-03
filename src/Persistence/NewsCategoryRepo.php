<?php

namespace App\Persistence;

use PDO;
use PDOException;

class NewsCategoryRepo
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function getNewsCategories(int $id)
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT cat FROM news_category inner join tbl_category where news_id = '$id' and cat_id = tbl_category.id";
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

    public function addNewsCategory(int $id, array $categories)
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO news_category (news_id, cat_id) VALUES";
            foreach ($categories as $category) {
                $sql .= '(' . '"' . $id . '"' . ',"' . $category . '"),';
            }
            $sql = rtrim($sql, ',');

            // use exec() because no results are returned
            $this->conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getCategories()
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM tbl_category";
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
}