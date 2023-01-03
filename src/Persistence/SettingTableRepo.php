<?php

namespace App\Persistence;

use PDO;
use PDOException;

class SettingTableRepo
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
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