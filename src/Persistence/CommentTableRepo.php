<?php

namespace App\Persistence;

use PDO;
use PDOException;

class CommentTableRepo
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
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
}