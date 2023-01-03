<?php

namespace App\Persistence;

use PDO;
use PDOException;

class NewsTableRepository
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function allNews(int $status)
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM news_tbl WHERE status = '$status'";
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

    public function fullNews(int $id)
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM news_tbl WHERE nid=$id ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return current($stmt->fetchAll());
        } catch (PDOException $e) {
            return false;
        }
    }

    public function addNews(string $title, $created, string $image, string $shortNews, string $longNews, int $status)
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO news_tbl (nid, title, created, image, short_news, long_news, status)
                    VALUES (null, '$title', '$created', '$image', '$shortNews', '$longNews', '$status')";
            // use exec() because no results are returned
            $this->conn->exec($sql);
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function selectOneNews(int $id)
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM news_tbl WHERE nid=$id ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $output = current($stmt->fetchAll());
            return $output;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteNews(int $id)
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // sql to delete a record
            $sql = "DELETE FROM news_tbl WHERE nid='$id'";

            // use exec() because no results are returned
            $this->conn->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateNews(int $nid, string $title, $created, string $image, string $shortNews, string $longNews, int $status)
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE news_tbl SET title='$title',created = '$created', image='$image',short_news='$shortNews',long_news='$longNews', status='$status' WHERE nid='$nid'";
            // Prepare statement
            $stmt = $this->conn->prepare($sql);
            // execute the query
            $stmt->execute();
            // echo a message to say the UPDATE succeeded
            echo $stmt->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function newsCount()
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT count(nid) FROM news_tbl";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return current($stmt->fetchAll());
        } catch (PDOException $e) {
            return false;
        }
    }

    public function threeLatestNews(int $count)
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM news_tbl WHERE status = 1  order by nid desc limit $count,3";
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

    public function fiveLatestNews(int $count)
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM news_tbl WHERE status=1 order by nid desc limit $count,5";
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