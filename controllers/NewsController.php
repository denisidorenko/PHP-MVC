<?php

  include_once ROOT.'/models/News.php';

  class NewsController 
  {

    public function actionIndex(){

    $NewsList = array();
    $NewsList = News::getNewsList();

    echo '<pre>';
    print_r($NewsList);
    echo '</pre>';

    
    }

    public function actionView($id){
      echo $id;
      return true;
    }

  }