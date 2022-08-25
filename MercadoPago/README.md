# MercadoPago -> Testes de API

Implementação básica da API de pagamentos do MercadoPago.
Este repositório trata-se apenas de uma página com exemplos da utilização em pequenas etapas.
O código encontra-se bem bagunçado, pois como dito acima, foi usado para aprendizado, e possui anotações.

**ATENÇÃO**: Isso não pode, em hipotese alguma, ser implementado desta maneira. Nos testes não me preocupei com injeção de código malicioso, o código pode (e certamente está) vulnerável a ataques.

No exemplo `MP_Default` foi usado o SDK padrão fornecido pelo MercadoPago.

No exemplo `REST_API` usei apenas a API REST do MercadoPago, fazendo requisições usando cURL, inclusive no server-side. Respostas bem claras em JSON, muito, mas muito mais fácil de utilizar, inicialmente.

## Como usar

 - **1** - Preencha suas credenciais no arquivo `_local/cred.php` dentro da pasta do exemplo.
 - **2** - *APENAS NO EXEMPLO DEFAULT* instale as dependências:
   - **Ambiente local, linux**: `composer install`
   - **Ambiente de produção, servidor apache**: `php composer.phar install`
 - **3** - Execute o servidor PHP de teste (ou suba pro seu site...):
   - **No linux**: `php -S localhost:8080`, por exemplo.
   - **No servidor apache**: basta subir e acessar.