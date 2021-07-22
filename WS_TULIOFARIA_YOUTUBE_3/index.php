<?php

header('Content-Type: application/json');

if(!array_key_exists('path', $_GET))
{
    echo 'Error. Path missing.';
    exit;
}

$path = explode('/', $_GET['path']);
if(count($path) == 0 || $path == "")
{
    echo 'Error. Path missing.';
    exit;
}

$param1 = "";

if(count($path) > 1)
{
    $param1 = $path[1];
}

$contents = file_get_contents('db.json');

$json = json_decode($contents, true);

$method = $_SERVER['REQUEST_METHOD'];

$body = json_decode(file_get_contents('php://input'), true);


//Para PESQUISARMOS as séries

if($method === 'GET')
{
    if($json[$path[0]])
    {
        if($param1 == "")
        {
            echo json_encode($json[$path[0]]);

        }
        else
        {
            $encontrado = -1;
            foreach($json[$path[0]] as $key => $obj)
            {
                if($obj['id'] == $param1)
                {
                    $encontrado = $key;
                    break;
                }
            }
            if($encontrado >= 0)
            {
                echo json_encode($json[$path[0]][$encontrado]);

            }
            else
            {
                echo 'ERROR.';
                exit;
            }
        }
    }
    else
    {
        echo 'Não existem séries cadastradas.';
    }
}

//Para INSERIRMOS novas séries

if($method === 'POST'){

    $jsonBody = $body;

    $jsonBody['id'] = time().'-'.mt_rand();

    if(!$json[$path[0]]){

        $json[$path[0]] = [];
    }

    $json[$path[0]][] = $jsonBody;
    echo json_encode($jsonBody);
    file_put_contents('db.json', json_encode($json));
}