<?php

header('Content-Type: application/json');                           //º - Informando que a minha saída SEMPRE será um Json

if(!array_key_exists('path', $_GET))                                //º - Para utilizarmos o param no final da url (ex: '?path=series'), estamos perguntando SE não existe um 'key' dentro do array, vindo via GET...
{
    echo 'Error. Path missing.';                                    //º - Caso não exista, retorna uma mensagem de erro amigável, feito o tratamento do erro.
    exit;                                                           //º - Sai da aplicação.
}

$path = explode('/', $_GET['path']);                                //º - O que vier via GET pela URL, vamos quebrar via barra '/' e salvar em '$path'
if(count($path) == 0 || $path[0] == "")                             //º - Se a gente CONTAR o $path, e ele for igual a '0' OU o que tem dentro de '$path[0]' for vazio, significa que não informamos nenhum parametro na URL e
{
    echo 'Error. Path missing.';                                    //º - Caso não exista, retorna uma mensagem de erro amigável, feito o tratamento do erro.
    exit;                                                           //º - Sai da aplicação.
}

$param1 = "";                                                       //º - Iniciando a variável $param1 com vazio.

if(count($path) > 1)                                                //º - Se eu contar o $path e ele for igual a 1, eu só tenho séries dentro do parametro. Se for MAIOR que 1, significa que eu tenho o $param1 ali, que é o 1º parametro da URL, então...
{
    $param1 = $path[1];                                             //º - ...o que vem no 1º parametro, eu atribuo para o param1
}

$contents = file_get_contents('db.json');                           //º - Aqui estamos carregando o nosso banquinho de dados

$json = json_decode($contents, true);                               //º - Estamos decodificando em Json o que estiver no nosso banquinho de dados, e informando 'true' para ele trazer como ARRAY

$method = $_SERVER['REQUEST_METHOD'];                               //º - MÉTODO DE REQUISIÇÃO - Aqui estamos pegando o que está vindo na url (se é GET, POST, PUT...) e guardando

$body = json_decode(file_get_contents('php://input'), true);        //º - O PHP lê a entrada padrão ('php://') para conseguir pegar o que o usuário mandou no body do Postman, Imnsonia... Enviando o Json que o usuário mandou pelo bady pra '$body' E JÁ DECODIFICANDO


//Para PESQUISARMOS as séries:

if($method === 'GET')                                               //º - SE o método de requisição for GET, vamos retornar o nosso Json
{
    if($json[$path[0]])                                             //º - SE eu achei DENTRO do'$json (db.json)' na posição '[$path[0]] o caminho 'series' ("series":[],"genres":[])
    {
        if($param1 == "")                                           //º - Agora, vamos checar SE estamos retornando só 1 carinha ou MAIS de 1. SE o $param1 for IGUAL a vazio... 
        {
            echo json_encode($json[$path[0]]);                      //º - ...a gente vai retornar TUDO que já temos, codificando para o formato JSON (json_encode) o que tem na posição '0' do $path, que está na var $json que recebeu o banco... 
    
        }
        else                                                        //º - Senão
        {
            $encontrado = -1;                                       //º - var $encontrado recebe '-1' para podermos fazer a condição de NÃO ENCONTRADO ($encontrado = -1) ou ENCONTRADO ($encontrado >= 0).
            foreach($json[$path[0]] as $key => $obj)                //º - Aqui, estamos percorrendo o dentro do json '$json[$path[0]]' para ENCONTRAR o id IGUAL ao '$param1'. Estamos percorrendo e armazenando os resultado em '$key', e o '$obj' está armazenando o que seria o ÍNDICE de um array, porém é o objeto do json
            {                               
                if($obj['id'] == $param1)                           //º - Agora, vamos checkar DENTRO do objeto, SE a gente tem o id informado na url via GET e que está dentro de $param1 (linha 22)
                {
                    $encontrado = $key;                             //º - Aqui o '$encontrado' está deixando de ter valor '-1' e passando a ter o valor da posição do objeto trazido pelo id que o usuário solicitou, por exemplo, se ele pediu para trazer a 3ª serie cadastrada, o $encontrado receberá o '2' (posição 0, posição 1, posição 2!!!)
                    
                    break;                                          //º - Parando a aplicação.
                }
            }
            if($encontrado >= 0)                                    //º - Então, SE o $encontrado for maior ou igual a 0 (receber 0, 1, 2 ...)
             {
                echo json_encode($json[$path[0]][$encontrado]);     //º - ...vai imprimir na tela os dados da 'series(objeto 'series' dentro do json - $json[$path[0]])', que está na posição '$encontrado' do json, codificando tudo pra json. 
                
            }
            else                                                    //º - Senão
            {
                echo 'ERROR.';                                      //º - Exibe o erro!
                exit;                                               //º - Sai da aplicação.
            }
        }
    }
    else                                                            //º - Senão...
    {
        echo 'Sem séries para listar.';                             //º - Retorno uma string vazia.
    }   
}


//Para INSERIRMOS novas séries:

if($method === 'POST')                                              //º - Se o método for igual a POST
{
    $jsonBody = ($body);                                            //º - Vou pegar o '$body' que É UM JSON DECODIFICADO (linha 14), passa-lo para a nova var '$jsonBody' e vamos processar ele para por um
    
    $jsonBody['id'] = time();                                       //º - ...'id' dentro dele, para podermos referenciar unicamente, ou tornar único esse objeto dentro de 'series'


    if(!$json[$path[0]])                                            //º - SE eu NÃO achei DENTRO do'$json (db.json)' na posição '[$path[0]] o caminho 'series' ("series":[],"genres":[])...
    {
        $json[$path[0]] = [];                                       //º - ...a gente cria ele e ele sera igual a um cochete '[]' vazio
    }
    
    $json[$path[0]][] = $jsonBody;                                  //º - Agora, vou pegar o '$json' la de cima, que recebe o nosso banco de dados, colocamos um '[]' na frente de '[$json[0]]' para inserir MAIS um item no array, e colocamos nele o '$jsonBody'
    echo json_encode($jsonBody);                                    //º - Depois disso, vou escrever (echo) em Json (json_encode) o que tem no '$jsonBody' para mostrar ao solicitante
    file_put_contents('db.json', json_encode($json));               //º - E além disso, vou SALVAR (file_put_contents) esse arquivo completo em 'db.json', codificando novamente para JSON (json_encode) o arquivo '$json' 
}
