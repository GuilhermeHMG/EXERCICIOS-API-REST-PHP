<?php

$url = 'http://htdocs/APIRestRCapoani/API_Rest_Em_PHP/public_html/api'; //Passando a url para consumir a API

$class = '/user'; //Informando a classe que queremos acessar na API
$param = ''; //Aqui, podemos informar vazio '' para poder acessar os dados de todos os usuários ou informar o id de qual usuário queremos acessar.

$response = file_get_contents($url.$class.$param); //Aqui, basicamente estamos concatenando(juntando) todas essa variáveis acima e passando para '$response' (ele cria uma requisição http)

//echo $response;

//Convertendo o Json para um array

$response = json_decode($response, 1); //Se eu deixar só o param '$response', o Json vai transformar em OBJETO, por isso, colocamos ', 1', para transformar em ARRAY!

var_dump($response['data'][0]['email']); //Trazendo o email do 1º usuário

?>