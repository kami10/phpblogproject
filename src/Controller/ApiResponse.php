<?php

namespace App\Controller;

use App\Interfaces\ControllerInterface;
use App\Services\DbService;

class ApiResponse implements ControllerInterface
{
    private DbService $dbService;

    public function __construct(DbService $dbService)
    {
        $this->dbService = $dbService;
    }

    public function handle()
    {
        //fullnews chikar konam? created? image? null az updatenews chie? error handling database response
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'] ?? null;
            if ($id) {
                return json_encode($this->dbService->selectOneNews($id));
            } else {
                return json_encode($this->dbService->allNews());
            }
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $request = json_decode(file_get_contents("php://input"), true);
            $title = $request['title'];
            $created = '2020-12-22 00:00:00';
            $filename = '';
            $shortNews = $request['shortNews'];
            $longNews = $request['longNews'];
            return json_encode($this->dbService->addNews($title, $created, $filename, $shortNews, $longNews));
        } elseif
        ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            $id = $_GET['id'] ?? null;
            return json_encode($this->dbService->deleteNews($id));
        } elseif
        ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            $id = $_GET['id'] ?? null;
            $request = json_decode(file_get_contents("php://input"), true);
            $title = $request['title'];
            $created = '2020-12-22 00:00:00';
            $filename = '';
            $shortNews = $request['shortNews'];
            $longNews = $request['longNews'];
            return json_encode($this->dbService->updateNews($id, $title, $created, $filename, $shortNews, $longNews));
        }
        return json_encode("wrong request");
    }
}