//º - Informando que a minha saída SEMPRE será um Json

//º - Para utilizarmos o param no final da url (ex: '?path=series'), estamos perguntando SE não existe um 'key' dentro do array, vindo via GET...{

//º - Caso não exista, retorna uma mensagem de erro amigável, feito o tratamento do erro.
//º - Sai da aplicação.
}

//º - O que vier via GET pela URL, vamos quebrar via barra '/' e salvar em '$path'
//º - Se a gente CONTAR o $path, e ele for igual a '0' OU o que tem dentro de '$path[0]' for vazio, significa que não informamos nenhum parametro na URL e
{
//º - Caso não exista, retorna uma mensagem de erro amigável, feito o tratamento do erro.
//º - Sai da aplicação.
}

//º - Iniciando a variável $param1 com vazio.

//º - Se eu contar o $path e ele for igual a 1, eu só tenho séries dentro do parametro. Se for MAIOR que 1, significa que eu tenho o $param1 ali, que é o 1º parametro da URL, então...{

//º - ...o que vem no 1º parametro, eu atribuo para o param1
}

//º - Aqui estamos carregando o nosso banquinho de dados

//º - Estamos decodificando em Json o que estiver no nosso banquinho de dados, e informando 'true' para ele trazer como ARRAY

//º - MÉTODO DE REQUISIÇÃO - Aqui estamos pegando o que está vindo na url (se é GET, POST, PUT...) através da global de SERVER e guardando em '$method'

//º - O PHP lê a entrada padrão ('php://') para conseguir pegar o que o usuário mandou no body do Postman, Imnsonia... Enviando o Json que o usuário mandou pelo bOdy pra '$body' E JÁ DECODIFICANDO, convertendo para array


//Para PESQUISARMOS as séries:


//º - SE o método de requisição for exatamente igual a GET, vamos retornar o nosso Json{

//º - SE eu achei DENTRO do'$json (db.json)' na posição '[$path[0]] o caminho 'series' ("series":[],"genres":[]){
    
//º - Agora, vamos checar SE estamos retornando só 1 carinha ou MAIS de 1. SE o $param1 for IGUAL a vazio...{
     
//º - ...a gente vai imprimir TUDO que já temos, codificando para o formato JSON (json_encode) o que tem na posição '0' do $path, que está na var $json que recebeu o banco... 
}
//º - senão{    
        
//º - var $encontrado recebe '-1' para podermos fazer a condição de NÃO ENCONTRADO ($encontrado = -1) ou ENCONTRADO ($encontrado >= 0).
//º - Aqui, estamos percorrendo o dentro do json '$json[$path[0]]' para ENCONTRAR o id IGUAL ao '$param1'. Estamos percorrendo e armazenando os resultado em '$key', e o ' => $obj' está armazenando o que seria o ÍNDICE de um array, porém é o objeto do json{
                                           
//º - Agora, vamos verificar SE DENTRO do objeto a gente tem o índice 'id' informado na url via GET e que está dentro de $param1 (linha 22){
                
//º - Aqui o '$encontrado' está deixando de ter valor '-1' e passando a ter o valor da posição do objeto trazido pelo id que o usuário solicitou, por exemplo, se ele pediu para trazer a 3ª serie cadastrada, o $encontrado receberá o '2' (posição 0, posição 1, posição 2!!!) através da '$key'.
                    
//º - Parando a aplicação.
                }
            }
//º - Então, se o $encontrado for maior ou igual a 0 (receber 0, 1, 2 ...){
             
//º - ...vai imprimir na tela os dados da 'series(objeto 'series' dentro do json - $json[$path[0]])', que está na posição '$encontrado' do json, codificando tudo pra json. 
}
            
//º - Senão{
            
//º - Exibe o erro!
//º - Sai da aplicação.
        }      
    }
}   
//º - Senão...{
    
//º - Imprime uma string vazia ou mensagem.
   }
}


//Para INSERIRMOS novas séries:


//º - SE o método for exatamente igual a POST{

//º - Vou pegar o '$body' que É UM JSON DECODIFICADO (linha 14),  passa-lo para a nova var '$jsonBody' e vamos criar um objeto 'id' dentro do '$jsonBody'...
    
//º - ...para podermos referenciar unicamente, ou tornar único esse objeto dentro de 'series', fazendo ele receber a função 'time().'-'.mt_rand();', pois usar time() conforme mencionado fornecerá uma maneira classificável de criar IDs exclusivos. A concatenação de strings também tornará mais aleatório o resultado desejado e ainda o manterá classificável. Certifique-se em concatenar com mt_rand() no final, caso contrário, dois ou mais usuários podem ter o mesmo id único se vierem exatamente ao mesmo tempo.


//º - SE eu NÃO achei DENTRO do'$json (db.json)' na posição '[$path[0]] o caminho 'series' ("series":[],"genres":[])...{
    
//º - ...a gente cria ele e ele sera igual a um cochete '[]' vazio
    }
    
//º - Agora, vou pegar o '$json' la de cima, que recebe o nosso banco de dados, colocamos um '[]' na frente de '[$json[0]]' para inserir MAIS um item no array, e colocamos nele o '$jsonBody'
//º - Depois disso, vou imprimir ao usuario (echo) o '$jsonBody', codificando-o para Json (json_encode), para mostrarmos o que ele acabou de cadastrar (POST).
//º - E além disso, vou SALVAR (file_put_contents) esse arquivo completo em 'db.json', codificando novamente para JSON (json_encode) o arquivo '$json' 
}