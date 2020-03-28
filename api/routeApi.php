<?php

define('ACTION',0);
define('PARAMS',1);
require_once "config/ConfigApi.php";
require_once "controller/ApiController.php";

function ParseURL($url){
  $URLexploded = explode('/',$url);
  $arrayreturn[ConfigApi::$RESOURCE] = $URLexploded[ACTION].'#'.$_SERVER['REQUEST_METHOD'];
  $arrayreturn[ConfigApi::$PARAMS] = isset($URLexploded[PARAMS]) ? array_slice($URLexploded,1) : null;
  return $arrayreturn;
}

if (isset($_GET['resource']))
{
    $urlData = ParseURL($_GET['resource']);
    $resource = $urlData[ConfigApi::$RESOURCE];//home
    if(array_key_exists($resource,ConfigApi::$RESOURCES)){
      $params = $urlData[ConfigApi::$PARAMS];
      $resource = explode('#', ConfigApi::$RESOURCES[$resource]);//array[0] -> TareasController [1] ->BorrarTarea
      $controller = new $resource[0]();
      $metodo = $resource[1];
      if (isset($params) && $params != null){
        echo $controller->$metodo($params);
      }
      else{
        echo $controller->$metodo();
      }
    }
}

 ?>