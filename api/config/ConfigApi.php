<?php
define ("HOME","http://".$_SERVER["SERVER_NAME"].dirname($_SERVER["PHP_SELF"])."/");
class ConfigApi
{
    public static $RESOURCE = 'resource';
    public static $PARAMS = 'params';
    public static $RESOURCES = [
      'comments#GET'=> 'ApiController#Comments',
      'comentar'=> 'ApiController#Comment',
      'user#GET'=> 'ApiController#User'
    ];

}

 ?>
