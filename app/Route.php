<?php 

namespace app;

/**
* 
*/
class Route
{
	public static function View($url, $view)
	{
		if(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))[2] === $url){
			require 'views/'.$view.'.php';
			die();
		}
	}
}
