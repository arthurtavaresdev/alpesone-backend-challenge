# Alpesone Backend Challenge

Teste para desenvolvedor back end desenvolvido para a Alpes One

## Sobre
- Objetivo: Fazer uma API que se consite basicamente em duas rotas, uma pra buscar os dados com alguns filtros e outra para buscar dados completos, para algum produto especifico.

### Seeder/Crawler
Neste teste, fiz um pequeno crawler no [site - semininovos.com.br](https://seminovos.com.br/), o qual busco, os dados dos produtos contidos na home, e monto um
seeder com o base no mesmo, por este motivo é **MUITO** provavel que os dados apresentados na documentação, estejam diferentes ao executar o resultado deste desafio.

### Crawler
- O Crawler segue a seguinte logica,em sua primeira execução, ele captura os links dos produtos que estão na home, os separo em um array. Após isto, especiono cada produto, em buscas dos rich snippets, seguindo as diretrizes determinadas pelo https://schema.org/. Retorno um multidimensonal array com todos os dados dos produtos, e faço a inserção do mesmo no banco de dados.

- PS: Realizei alguns testes com algumas outras versões deste robo, como mapeando o site inteiro em buscas detes dados. Mas não consegui otimizar o algoritmo a tempo para a entrega do projeto.


## Tecnologias Utilizadas
- PHP - Versão 7.4.0
- [Lumen (Laravel)](https://github.com/laravel/lumen)
- [Guzzle](https://github.com/guzzle/guzzle)
- [Symfony DomCrawler Component](https://github.com/symfony/dom-crawler)
- Postman/Insomminia

## Instação/Execução da API

Instalação:

```sh
cd car-search
composer install
```
- **Definir as credencias do banco de dados no arquivo .env**

```sh
php artisan migrate
php artisan db:seed --class=CarsSeeder
```


Execução:

```sh
php -S localhost:8000 -t public
```

## [Documentação](https://documenter.getpostman.com/view/5518072/SztEZRwh?version=latest#1c7458ee-0869-4907-8c63-55168e6b872c)
