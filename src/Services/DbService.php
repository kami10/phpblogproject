<?php

namespace App\Services;

class DbService
{
    private DbConnection $dbConnection;

    public function __construct(DbConnection $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }

    public function allNews()
    {
        return $this->dbConnection->allNews();
    }

    public function checkLogin()
    {
        return $this->dbConnection->login();
    }

    public function fullNews(int $id)
    {
        return $this->dbConnection->fullNews($id);
    }

    public function addNews(int $nid, string $title, string $date, string $image, string $shortNews, string $longNews)
    {
        return $this->dbConnection->addNews($nid, $title, $date, $image, $shortNews, $longNews);
    }

    public function newComments()
    {
        return $this->dbConnection->newComments();
    }

    public function deleteComment(int $id)
    {
        return $this->dbConnection->deleteComment($id);
    }

    public function updateComment(int $id)
    {
        $this->dbConnection->updateComment($id);
    }

    public function deleteNews(int $id)
    {
        return $this->dbConnection->deleteNews($id);
    }
}