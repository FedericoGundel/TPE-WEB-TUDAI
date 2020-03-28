<?php

define('ACTION',0);
define('PARAMS',1);
require_once "controller/MoviesController.php";
require_once "config/ConfigApp.php";

function ParseURL($url){
  $URLexploded = explode('/',$url);
  $arrayreturn[ConfigApp::$ACTION] = $URLexploded[ACTION];
  $arrayreturn[ConfigApp::$PARAMS] = isset($URLexploded[PARAMS]) ? array_slice($URLexploded,1) : null;
  return $arrayreturn;
}

if (isset($_GET['action']))
{
#  URL=borrar/1/2/3/4
#  $urlData[ACTION] = borrar
#  $urlData[PARAMS] = [1,2,3,4]
    $urlData = ParseURL($_GET['action']);
    $action = $urlData[ConfigApp::$ACTION];//home
    if(array_key_exists($action,ConfigApp::$ACTIONS)){
      $params = $urlData[ConfigApp::$PARAMS];
      $action = explode('#', ConfigApp::$ACTIONS[$action]);//array[0] -> TareasController [1] ->BorrarTarea
      $controller = new $action[0]();
      $metodo = $action[1];
      if (isset($params) && $params != null){
        echo $controller->$metodo($params);
      }
      else{
        echo $controller->$metodo();
      }
    }
}

 ?>
