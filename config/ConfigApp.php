<?php


class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      ''=> 'MoviesController#Home',
      "movies"=>"MoviesController#Movies",
      "add"=>"MoviesController#AddMovie"
    ];

}

 ?>
