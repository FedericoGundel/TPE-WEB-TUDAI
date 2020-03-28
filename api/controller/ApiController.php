<?php

require_once "Api.php";
require_once "./../model/CommentsModel.php";
require_once "./../model/MoviesModel.php";

class ApiController extends Api
{
  private $model;

  function __construct()
  {
    parent::__construct();
    $this->model = new CommentsModel();
    $this->model2 = new MoviesModel();
  }



  function Comments($params){
      $id_movie = $params[0];
      $data = $this->model->GetComments($id_movie);
    if (isset($data)){
      return $this->json_response($data, 200);
    }
    else{
      return $this->json_response(null, 404);
    }
  }
  function Comment($params){
    $id_usuario = $_POST["usuario"];
    $comentario = $_POST["comentario"];
    $puntaje = $_POST["puntaje"];
    $id_movie = $params[0];
    $r = $this->model->PostComment($id_movie,$id_usuario,$comentario,$puntaje);
    return $this->json_response($r, 200);
  } 
  function User($params){
    $id_usuario = $params[0];
    $data = $this->model->GetUserById($id_usuario);
    if (isset($data)){
      return $this->json_response($data, 200);
    }
    else{
      return $this->json_response(null, 404);
    }
  }




}


 ?>
