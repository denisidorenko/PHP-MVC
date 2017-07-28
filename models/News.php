<?php

class News
{

  public static function getNewsItemById($id)
  {
    ## Запрос к базе данных для выдачи статьи по ID;
  }

  public static function getNewsList()
  {

    $host = 'localhost';
    $dbname = 'mvc_news';
    $user = 'root';
    $password = '';
    $db = new PDO("mysql:host=$host; dbname = $dbname", $user, $password);

    $NewsList = array();

    $result = $db->query('SEECT id, title, date, short_content'
                        . 'FROM news'
                        . 'ORDER by date DESC'
                        . 'LIMIT 10');

    $i = 0;
    while($row = $result->fetch()){
      $NewsList($i)['id'] = $row['id'];
      $NewsList($i)['title'] = $row['title'];
      $NewsList($i)['date'] = $row['date'];
      $NewsList($i)['short_content'] = $row['short_content'];
      $i++;
    }
                        
  return $NewsList;
  }

}