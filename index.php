<?php

## Включаем отображение ошибок
ini_set('display_errors', 1);
error_reporting(E_ALL);

## Подключение файлов
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Router.php');


## Подключаем базу данных


## Вызов Router'a

$router = new Router;
$router -> run();

