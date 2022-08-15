<p align="center">Projeto CRUD - Cadastro de endereços</p>

## Sobre o projeto

Este projeto foi desenvolvido em Laravel 8.x, utilizada a API VIA CEP e Datatable.

- [Documentação Laravel](https://laravel.com/docs/8.x/readme).
- [API Via Cep](https://viacep.com.br/).
- [DataTable](https://datatables.yajrabox.com/).

## Instalação inicial

Clone o projeto do GIT
- git clone <projeto git>

Passo a passo para iniciarlização do projeto

- composer install

- cp .env.example .env

- php artisan key:generate

- php artisan migrate --seed

- php artisan serve