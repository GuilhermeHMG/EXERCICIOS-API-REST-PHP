<?php

namespace SRC\Controllers;

use src\Connection\Connection;
use src\Models\Model;

class Controller{

    public function __construct()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET'){

            $data = json_decode(file_get_contents('php://input'), true);
            $idusuario = (empty($_GET['idusuario']) ? "" : (int)$_GET['idusuario']);
            
            $model = new Model(Connection::getInstance(), $data, $idusuario);

        }
        else
        {
            header('HTTP/1.1 401 Unauthorized');
            echo json_encode(array("response"=>"Método não previsto na API."));
            exit;
        }
    }
}