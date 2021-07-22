<?php

header('Content-Type: application/json');

if(!array_key_exists('path', $_GET))
{
    echo 'Error. Path missing.';
    exit;
}

$path = explode('/', $_GET['path']);

if(count($path) == 0 || $path[0] == "")
{
    echo 'Error. Path missing.';
    exit;
}

$param1 = "";

if(count($path) > 1)
{
    $param1 = $path[1];

    var_dump($path[1]);
}

