<?php

namespace SRC\Controllers;

use SRC\Connection\Connection;
use SRC\Models\Model;

class Controller
{
    public function __construct()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            $page = (empty($_GET['page']) ? 1 : (int)$_GET['page']);  //Se ESTIVER VAZIO, faça
            $limit = (empty($_GET['limit']) ? 100 : (int)$_GET['limit']);

            $data = json_decode(file_get_contents('php://input'), true); //TRUE porque é para converter em um array associativo

            $model = new Model(Connection::getInstance(), $data, $page, $limit);

        }
        else
        {
            header('HTTP/1.1 401 Unauthorized');
            echo json_encode(array("response" => "Método não previsto na API"));
            exit;
        }
    }
}