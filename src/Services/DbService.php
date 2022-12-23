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

    public function addNews(string $title, string $created, string $image, string $shortNews, string $longNews)
    {
        return $this->dbConnection->addNews($title, $created, $image, $shortNews, $longNews);
    }

    public function newComments()
    {
        return $this->dbConnection->newComments();
    }

    public function deleteComment(int $id)
    {
        return $this->dbConnection->deleteComment($id);
    }

    public function selectOneNews(int $id)
    {
        return $this->dbConnection->selectOneNews($id);
    }

    public function updateComment(int $id)
    {
        return $this->dbConnection->updateComment($id);
    }

    public function deleteNews(int $id)
    {
        return $this->dbConnection->deleteNews($id);
    }

    public function updateNews(int $nid, string $title, $created, string $image, string $shortNews, string $longNews)
    {
        return $this->dbConnection->updateNews($nid, $title, $created, $image, $shortNews, $longNews);
    }

    public function newsRelatedComments(int $nid)
    {
        return $this->dbConnection->newsRelatedComments($nid);
    }

    public function addComment(int $nid, string $comment)
    {
        $this->dbConnection->addComment($nid, $comment);
    }

    public function newsCount()
    {
        return $this->dbConnection->newsCount();
    }

    public function threeLatestNews(int $count)
    {
        return $this->dbConnection->threeLatestNews($count);
    }

    public function fiveLatestNews(int $count)
    {
        return $this->dbConnection->fiveLatestNews($count);
    }

    public function addNewsCategory(int $id, array $categories)
    {
        $this->dbConnection->addNewsCategory($id, $categories);
    }

    public function getNewsCategories(int $id)
    {
        return $this->dbConnection->getNewsCategories($id);
    }

    public function addSetting(string $option, string $input)
    {
        $this->dbConnection->addSetting($option, $input);
    }

    public function getSettingTemplate(){
        return $this->dbConnection->getSettingTemplate();
    }
}
