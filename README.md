# alpesone-backend-challenge

Teste para desenvolvedor back end desenvolvido para a Alpes One

## Sobre
- Objetivo: Fazer uma API que se consite basicamente em duas rotas, uma pra buscar os dados com alguns filtros e outra para buscar dados completos, para algum produto especifico.

### Seeder/Crawler
Neste teste, fiz um pequeno crawler no [site - semininovos.com.br](https://seminovos.com.br/), o qual busco, os dados dos produtos contidos na home, e monto um
seeder com o base no mesmo, por este motivo é **MUITO** provavel que os dados apresentados na documentação, estejam diferentes ao executar o resultado deste desafio.

## Framework Utilizado
- Lumen (Laravel)

## Instação/Execução da API

Instalação:

```sh
cd car-search
composer install
php artisan migrate
php artisan db:seed --class=CarsSeeder
```

- **Definir as credencias do banco de dados no arquivo .env**

Execução:

```sh
php -S localhost:8000 -t public
```
