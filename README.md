# Conversor de Unidades: Quilômetros ↔ Anos-Luz
Este projeto é uma aplicação PHP desenvolvida com o framework Laravel que realiza a conversão entre quilômetros (km) e anos-luz. A aplicação disponibiliza uma interface web e oferece endpoints para integração com outras aplicações.

**🚀 Funcionalidades**
- Conversão de quilômetros (km) para anos-luz.
- Conversão de anos-luz para quilômetros (km).

**🛠️ Endpoints Disponíveis**
A API possui dois endpoints principais:

**_1. POST /api/quilometros_**
  Converte um valor em anos-luz para quilômetros.

**📥 Parâmetros de Requisição:**
light_years (obrigatório): Um número positivo representando o valor em anos-luz.
📤 Respostas:
    1. 200 OK:
        Corpo da resposta:
            json 
            {
              "quilometros": "valor em quilômetros"
            }
    2. 400 Bad Request:
        Corpo da resposta (se os parâmetros forem inválidos):
            json
            {
              "erro": "parâmetros inválidos"
            }
**_2. POST /api/anosLuz_**
  Converte um valor em quilômetros para anos-luz.

**📥 Parâmetros de Requisição:**
kilometers (obrigatório): Um número positivo representando o valor em quilômetros.
📤 Respostas:
    1.200 OK:
        Corpo da resposta:
            json
            {
              "anoLuz": "valor em anos-luz"
            }
    2. 400 Bad Request:
        Corpo da resposta (se os parâmetros forem inválidos):
            json
            {
              "erro": "parâmetros inválidos"
            }

**🔧 Requisitos e Dependências**
Requisitos do Sistema:
- PHP 7.4 +
- Composer para gerenciamento de dependências
- Laravel 8.x (framework principal)
  
Configuração do Projeto:
Clone este repositório:
    _git clone https://github.com/brunaborgesrb/Projeto-PHP.git_
Navegue até a pasta do projeto:
    _cd Projeto-PHP_
Instale as dependências:
    _composer install_
Inicie o servidor local:
    _php artisan serve_

**🌐 Interface Web**
Além da API, a aplicação possui uma interface web simples e interativa que permite a conversão manual entre as unidades. Basta inserir o valor desejado no campo correspondente e clicar em "Converter".

**🧪 Testes Unitários**
O projeto inclui testes unitários para validar a funcionalidade dos endpoints. Para executá-los:
    _php artisan test_
