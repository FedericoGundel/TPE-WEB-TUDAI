<?php
    require_once  ('./libs/Smarty.class.php');
    class MoviesView
    {
        function DisplayMovies($Movies){
            $template = "movies.tpl";
            $smarty = new Smarty();
            $smarty->assign('movies',$Movies);
            $smarty->assign('template',$template);
            $smarty->display('templates/main.tpl');
          }
          function DisplayMovie($Movie){
            $template = "movie.tpl";
            $smarty = new Smarty();
            $smarty->assign('movie',$Movie);
            $smarty->assign('template',$template);
            $smarty->display('templates/main.tpl');
          }

          function DisplayHome(){
            $template = "home.tpl";
            $smarty = new Smarty();
            $smarty->assign('template',$template);
            $smarty->display('templates/main.tpl');
          }
    }
    

?>