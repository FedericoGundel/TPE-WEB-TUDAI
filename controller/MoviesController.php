<?php

require_once  "./view/MoviesView.php";
require_once  "./model/MoviesModel.php";

class MoviesController{
    private $view;
    private $model;
    private $Titulo;

    function __construct()
    {
      $this->view = new MoviesView();
      $this->model = new MoviesModel();
    }

    function Home(){
      $this->view->DisplayHome();
    }
    function Movies($params = null){
      if(isset($params)){
        $id_pelicula = $params[0];
        $pelicula = $this->model->GetMovieById($id_pelicula);
        $this->view->DisplayMovie($pelicula);
      }else{
        $movies = $this->model->GetMovies();
        $this->view->DisplayMovies($movies);
      }
    }
    function AddMovie(){
      $imagen = $_POST["imagen"];
      $nombre = $_POST["nombre"];
      $descripcion = $_POST["descripcion"];
      $id_puntaje = $_POST["puntaje"];
      $this->model->UploadMovie($imagen,$nombre,$descripcion,$id_puntaje);
      header("http://127.0.0.1/WEB/TPE-Movies/movies");
    }

  


}
?>
