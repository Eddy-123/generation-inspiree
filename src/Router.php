<?php 
class Router
{
	/**
	 * Define the controller, action and parameters in $request
	 */

	static function parse($url, $request){
		$url = trim($url, '/');
		$params = explode('/', $url);
		$request->controller = $params[0];
		$request->action = isset($params[1]) ? $params[1] : 'index';
		$request->params = array_slice($params, 2);
	}
}
 ?>