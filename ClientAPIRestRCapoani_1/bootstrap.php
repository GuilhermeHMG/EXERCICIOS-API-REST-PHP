<?php
//-----Informações que vieram do Postman-----

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://htdocs/APIRestRCapoani/API_Rest_Em_PHP/public_html/api/user',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);

//-----//Informações que vieram do Postman-----

//Decodificando o arquivo Json que veio da API
$response = json_decode($response);

//echo"<pre>";
//print_r($response);
//echo"</pre>";


//Tratando os dados:

//Pegando o array 'data' dentro do objeto '$response' e colocando no array '$arr_dados'
$arr_dados = $response->data;

//Percorrendo o array '$arr_dados' e trazendo os valores id, email, password e name de DENTRO do objeto '$dados'
$i = 0;
foreach($arr_dados as $dados){
  $id[$i] = $dados->id;
  $email[$i] = $dados->email;
  $password[$i] = $dados->password;
  $nome[$i] = $dados->name;

$i++;
}

//Acessando a posição 0 do array dentro do objeto: 
/*
echo $id[0]."<br>";
echo $email[0]."<br>";
echo $password[0]."<br>";
echo $nome[0]."<br>";
*/
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Consumindo a API Rest R. Capoani</title>
    <style>
     
      table, th, td{
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
      }

    </style>
  </head>
  <body>
    <h1 align='center'>Tabela de informações</h1>
    <div class="container">
      <table width='100%' class="table table-striped">
        <tr class="table-primary">
          <th>ID</th>
          <th>E-mail</th>
          <th>Senha</th>
          <th>Nome</th>
        </tr>
        <tr>
          <td><?php echo $id[0] ?></td>
          <td><?php echo $email[0]?></td>
          <td><?php echo $password[0]?></td>
          <td><?php echo $nome[0]?></td>
        </tr>
        <tr>
          <td><?php echo $id[1] ?></td>
          <td><?php echo $email[1]?></td>
          <td><?php echo $password[1]?></td>
          <td><?php echo $nome[1]?></td>
        </tr>
        <tr>
          <td><?php echo $id[2] ?></td>
          <td><?php echo $email[2]?></td>
          <td><?php echo $password[2]?></td>
          <td><?php echo $nome[2]?></td>
        </tr>
        <tr>
          <td><?php echo $id[3] ?></td>
          <td><?php echo $email[3]?></td>
          <td><?php echo $password[3]?></td>
          <td><?php echo $nome[3]?></td>
        </tr>
      </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>
