<?php

namespace App\Services;

use Cassandra\Date;
use PDO;
use PDOException;

class DbConnection
{
    public function allNews()
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=phpblog_db", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM news_tbl ";
            $stmt = $conn->prepare($sql);
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

    public function login()
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=phpblog_db", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM tbl_login ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $key => $value) {
                return $value;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function fullNews(int $id)
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=phpblog_db", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM news_tbl WHERE nid=$id ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return current($stmt->fetchAll());
        } catch (PDOException $e) {
            return false;
        }
    }

    public function addNews(string $title, $created, string $image, string $shortNews, string $longNews)
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=phpblog_db", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO news_tbl (nid, title, created, image, short_news, long_news)
                    VALUES (null, '$title', '$created', '$image', '$shortNews', '$longNews')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function newComments()
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=phpblog_db", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM tbl_comment WHERE status = 0 ";
            $stmt = $conn->prepare($sql);
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

    public function deleteComment(int $id)
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=phpblog_db", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // sql to delete a record
            $sql = "DELETE FROM tbl_comment WHERE cid=$id";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function selectOneNews(int $id)
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=phpblog_db", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM news_tbl WHERE nid=$id ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $output = current($stmt->fetchAll());
            return $output;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateComment(int $id)
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=phpblog_db", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE tbl_comment SET status=1 WHERE cid=$id";

            // Prepare statement
            $stmt = $conn->prepare($sql);

            // execute the query
            $stmt->execute();

            // echo a message to say the UPDATE succeeded
            echo $stmt->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteNews(int $id)
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=phpblog_db", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // sql to delete a record
            $sql = "DELETE FROM news_tbl WHERE nid='$id'";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function updateNews(int $nid, string $title, $created, string $image, string $shortNews, string $longNews)
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=phpblog_db", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE news_tbl SET title='$title',created = '$created', image='$image',short_news='$shortNews',long_news='$longNews' WHERE nid='$nid'";
            // Prepare statement
            $stmt = $conn->prepare($sql);
            // execute the query
            $stmt->execute();
            // echo a message to say the UPDATE succeeded
            echo $stmt->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function newsRelatedComments(int $nid)
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=phpblog_db", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT comments FROM tbl_comment inner join news_tbl on tbl_comment.nid = news_tbl.nid where tbl_comment.nid='$nid' AND tbl_comment.status='1'";
            $stmt = $conn->prepare($sql);
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

    public function addComment(int $nid, string $comment)
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=phpblog_db", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tbl_comment (cid, nid, comments, status)
                    VALUES (null, '$nid', '$comment', '0')";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}