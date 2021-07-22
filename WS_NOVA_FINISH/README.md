Exemplo de utilização
=============

É esperado o recebimento de um arquivo do tipo **json**, [**via método GET**](https://github.com/pandao/editor.md "Heading link"), com apenas um parametro do tipo **hash**, esse parâmetro é associado ao **CNPJ** que está previamente cadastrado na aplicação, dentro de *config.ini*.

### Exemplo de envio:

```
{
  "hash" : "73f6637c38e73b4a5f54e3bc804ccca"
}
```

### Exemplo de retorno:

```
{
  "response": [
  {
     "codigo": "5000242149",
     "custoMedio": "10",
     "margem": "5",
     "linha": "1",
     "grupoDesc": "nova",
     "descricao": "ARRUELA DE COBRE",
     "empresa": "E00001",
     "prateleira": "P04D02",
     "valor": "6.1",
     "estoque": "0"
   }
  ]
}
```
### Observação:
Para cada **CNPJ** existe uma **hash** específica, e para o retorno de todos os **CNPJ's** também é necessário passar uma **hash** específica.

### Configuração da Api:

> Arquivo: Config/config.ini

- Parâmetros para conexão com o banco de dados.
- Cadastro de **CNPJ**.
- Palavra chave para verificação da **hash**.
- Palavra chave para retorno de todos os **CNPJ's**.
