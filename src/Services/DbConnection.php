<?php

namespace App\Services;

use Cassandra\Date;
use PDO;
use PDOException;

class DbConnection
{
    private PDO $conn;

    public function __construct(array $config)
    {
        $this->conn = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['username'], $config['password']);
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

    public function newComments()
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM tbl_comment WHERE status = 0 ";
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

    public function deleteComment(int $id)
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // sql to delete a record
            $sql = "DELETE FROM tbl_comment WHERE cid=$id";

            // use exec() because no results are returned
            $this->conn->exec($sql);
            echo "Record deleted successfully";
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

    public function updateComment(int $id)
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE tbl_comment SET status=1 WHERE cid=$id";

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

    public function newsRelatedComments(int $nid)
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT comments FROM tbl_comment inner join news_tbl on tbl_comment.nid = news_tbl.nid where tbl_comment.nid='$nid' AND tbl_comment.status='1'";
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

    public function addComment(int $nid, string $comment)
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tbl_comment (cid, nid, comments, status)
                    VALUES (null, '$nid', '$comment', '0')";

            // use exec() because no results are returned
            $this->conn->exec($sql);
            echo "New record created successfully";
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

    public function addSetting(string $option, string $input)
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE tbl_setting SET template_option ='$option',inputvalue ='$input' WHERE id='1'";
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

    public function getSettingTemplate()
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT inputvalue FROM tbl_setting WHERE template_option='template' ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $output = current($stmt->fetchAll());
            return $output;
        } catch (PDOException $e) {
            return false;
        }
    }
}