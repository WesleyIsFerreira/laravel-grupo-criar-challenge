# Challenge Grupo CRIAR

Este guia detalhado irá auxiliá-lo na configuração e execução do projeto.

## Pré-requisitos

Antes de começar, certifique-se de que as seguintes ferramentas estão instaladas:

-   [Composer](https://getcomposer.org/) (v2.7.9)
-   [PHP](https://www.php.net) (v8.2.12 ou superior)
-   [XAMPP](https://www.apachefriends.org/index.html) ou outro ambiente de PHP/MySQL para rodar o backend

## Instalação e Configuração

Após clonar o projeto para sua máquina local, na raiz do projeto, execute os comandos:

```bash
# Instala as dependências do Laravel
composer install

# Cria o .env com base no .env.example
cp .env.example .env

# Gera a chave de criptografia da aplicação
php artisan key:generate

# Cria o banco de dados "kart_mania"
php artisan db:create

# Executa as migrations para criar as tabelas
php artisan migrate

# Popula a tabela "race_laps"
php artisan db:seed --class=RaceLapSeeder

# Inicia o servidor local do Laravel
php artisan serve
```

O projeto estará rodando em http://localhost:8000.
