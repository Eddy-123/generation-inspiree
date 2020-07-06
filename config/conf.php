<?php 

/**
 * Define connexion setting in static variable $databases
 */
class Conf
{
	static $debug = 1;
	static $databases = array(
		'default' 	=> array(
			'host' 		=> 'localhost',
			'database' 	=> 'generation-inspiree',
			'login'		=> 'root',
			'password' 	=>	'root'
		)
	);
}
	