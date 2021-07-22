<?php

namespace SRC\Models;

class Validations{

    public static function validationHash($hash = null){

        $dir = __DIR__.'/../../config/config.ini';
        $conf = parse_ini_file($dir, true);

        $cpf = false;
        $i=0;

        while(!$cpf && $i < count($conf['DEFAULT'])){
            $cpf = ($hash == md5($conf['DEFAULT'][$i].$conf['HASH']['keyword']) 
            ? $conf['DEFAULT'][$i] : false);
            if($cpf !=false) break;

            $i++;
        }
        return $cpf;
    }
}

?>