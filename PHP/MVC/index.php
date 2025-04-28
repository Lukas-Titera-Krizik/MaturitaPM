<?php

function autoload(string $trida): void
{
    require_once("classes/" . $trida . ".php");
}

spl_autoload_register("autoload");

$model = new Model();
$controller = new Controller($model);
$router = new Router();

// Definujeme routy
$router->addRoute('/', function() use ($controller) {
    $controller->showItems();
});

$router->addRoute('/add/', function() use ($controller) {
    $controller->addItemForm();
});

$router->addRoute('/detail/', function() use ($controller) {
    $controller->showItemDetail();
});

$router->addRoute('/about/', function() use ($controller) {
    $controller->showAbout();
});

$router->addRoute('/delete/', function() use ($controller) {
    $controller->deleteItem();
});

$router->addRoute('/item/edit/', function() use ($controller) {
    $controller->editItem();
});

$router->addRoute('/vyplneni/', function() use ($controller) {
    $controller->vyplneniItem();

});

// Spuštění routování
$router->route();
