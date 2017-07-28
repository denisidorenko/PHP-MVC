<?php

  class NewsController 
  {

    public function actionIndex(){
      echo 'NewsController => actionIndex';
      return true;
    }

    public function actionView($category, $id){
      echo $category;
      echo $id;
      return true;
    }

  }