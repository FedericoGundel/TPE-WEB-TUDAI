<?php
class MoviesModel
{
  private $db;

  function __construct()
  {
    $this->db = $this->Connect();
  }

  function Connect(){
    return new PDO('mysql:host=localhost;'
    .'dbname=movies;charset=utf8'
    , 'root', '');
  }

  function GetMovies(){
      $sentencia = $this->db->prepare( "SELECT * from pelicula");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  function GetMovieById($id_peliculas){
    $sentencia = $this->db->prepare( "select * from pelicula where id_peliculas =?");
    $sentencia->execute(array($id_peliculas));
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }
  function GetUserById($id_usuario){
    $sentencia = $this->db->prepare( "select * from usuario where id_usuario =?");
    $sentencia->execute($id_usuario);
    return $sentencia->fetch(PDO::FETCH_ASSOC);
  }
  function UploadMovie($imagen,$nombre,$descripcion,$id_puntaje){
    $sentencia = $this->db->prepare("INSERT INTO pelicula(imagen,nombre,descripcion,id_puntaje) VALUES(?,?,?,?)");
    $sentencia->execute(array($imagen,$nombre,$descripcion,$id_puntaje));
  }

}
?>