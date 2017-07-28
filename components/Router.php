<?php

class Router {

  private $routes;

  public function __construct()
  {

    $routesPath = ROOT.'/config/routes.php';
    $this->routes = include($routesPath);

  }
  ## Метод возврощает строку 
  private function getURI(){
    if(!empty($_SERVER['REQUEST_URI'])){
      return trim($_SERVER['REQUEST_URI'], '/' );
    }
  }

  public function run()
  {
    
    ## Получаем строку запроса
    $uri = $this -> getURI();

    ## Проверяем через цикл наличия такого запроса

    foreach ($this->routes as $uriPattern => $path){
      if(preg_match("~$uriPattern~", $uri)){

      $segment = explode('/' , $path); // Разделили имя Контроллера и его модификатор
      
      $controllerName = array_shift($segment).'Controller'; // Редактируем первый элемент массива
      $controllerName = ucfirst($controllerName); // Первая буква заглавная

      $actionName = 'action'.ucfirst(array_shift($segment)); // Получаем имя модификатора

      ## Прописываем путь к файлам

      $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

        if(file_exists($controllerFile)){
        include_once($controllerFile);
        }
      
      $controllerObject = new $controllerName;
      $result = $controllerObject->$actionName();
      if($result != null){
        break;
      }

      }
    }

  }
}