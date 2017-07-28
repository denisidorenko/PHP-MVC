<?php

  class NewsController 
  {

    public function actionIndex(){
      echo 'NewsController => actionIndex';
      return true;
    }

    public function actionView(){
      echo 'Просмотр одной новости';
      return true;
    }

  }