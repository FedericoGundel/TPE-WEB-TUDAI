<?php
/**
 *
 */
class CommentsModel
{

  function __construct()
  {
  $this->db = $this->Connect();
  }
  private function Connect(){
    return new PDO('mysql:host=localhost;'.'dbname=movies;charset=utf8', 'root', '');
  }

  function GetComments($id_movie){
        $sentencia = $this->db->prepare( "select * from comentario where id_peliculas =?");
        $sentencia->execute(array($id_movie));
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    function PostComment($id_movie,$id_usuario,$comentario,$puntaje){
        $sentencia = $this->db->prepare("INSERT INTO comentario(id_peliculas,id_usuario,comentario,puntaje) VALUES(?,?,?,?)");
        $sentencia->execute(array($id_movie,$id_usuario,$comentario,$puntaje));     
    }

  function GetUserById($id){
    $sentencia = $this->db->prepare( "select * from usuario where id_usuario =?");
        $sentencia->execute(array($id));
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }



}

 ?>