<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/cars', 'CarsController@index');
$router->get('/cars/{sku}', 'CarsController@show');
