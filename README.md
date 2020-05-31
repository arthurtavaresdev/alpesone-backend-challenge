# alpesone-backend-challenge

Teste para desenvolvedor back end desenvolvido para a Alpes One

## Instação/Execução da API

Instalação:

```sh
cd car-search
composer install
php artisan migrate
php artisan db:seed --class=CarsSeeder
```

- Definir as credencias do banco de dados no arquivo .env;

Execução:

```sh
php -S localhost:8000 -t public
```
