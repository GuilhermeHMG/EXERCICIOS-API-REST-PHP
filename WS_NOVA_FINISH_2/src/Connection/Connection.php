<?php

namespace SRC\Connection;

class Connection
{
    private static $instance;

    private function __construct()
    {
        
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new self();
        }
            return self::$instance;
    }

    public function connect()
    {
        $dir = __DIR__.'/../../config/config.ini';
        $conf = parse_ini_file($dir, true);
        $conn = NewADOConnection($conf['DATABASE']['driver']);

        if(!$conn)
        {
            echo 'Falha ao conectar no banco!';
            exit;
        }
        $conn->Connect($conf['DATABASE']['host'],$conf['DATABASE']['user'],$conf['DATABASE']['pass'],$conf['DATABASE']['dbname']);

        return $conn;
    }
}