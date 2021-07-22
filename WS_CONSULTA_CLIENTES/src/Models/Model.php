<?php

namespace src\Models;

class Model{
    private $conn;
    private $idusuario;

    public function __construct($conn, $data = null, $idusuario)
    {

        $this->conn = $conn->connect();
        $this->idusuario = $idusuario;

        $cpf = Validations::validationHash($data['hash']);

        if($cpf != false)
        {

            $this->ListCpf($cpf);
    
        }
        else
        {
            header('HTTP/1.1 401 Unauthorized');
            echo json_encode(array("response"=>"Erro de autenticação."));
            exit;
        }
    }

    private function ListCpf($cpf)
    {

        $data = array();
        $records = '';
        $i = 0;

        if($cpf == '39284083800')
        {

            $query = (
            'SELECT idusuario, deslogin, dessenha, dtcadastro FROM tb_usuarios;'
            );

        }
        elseif($cpf == '42039941878')
        {
            $query = (
                'SELECT idusuario, deslogin, dessenha, dtcadastro FROM tb_usuarios;'
            );
        }

        $result = $this->conn->PageExecute($query, $this->idusuario);

        if(!$result)
        {
            exit(json_encode('Sem resultados válidos!'));
        }

        $records = $result->MaxRecordCount();

        while(!$result->EOF){
            for($k=0; $k < 4; $k++)
            {
                switch($k)
                {
                    case 0:
                        $data[$i]['idusuario'] = ($result->fields[$k]);
                        break;
                    case 1:
                        $data[$i]['deslogin'] = ($result->fields[$k]);
                        break;
                    case 2:
                        $data[$i]['dessenha'] = ($result->fields[$k]);
                        break;
                    case 3:
                        $data[$i]['dtcadastro'] = ($result->fields[$k]);
                        break;
                }
            }
            $data = (!empty($data) ? $data : null);

            $dataResponse = array(
                'headers'=>array(
                    'records_total'=>$records,
                    'records_on_page'=>$result->RecordCount(),
                    'last_page' => $result->LastPageNo(),
                    'current_page' => $this->page
                ),
                'data'=> $data
            );
            echo json_encode(array("response"=> $dataResponse));
        }
    }
}
