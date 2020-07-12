<?php

function debug($variable){
    echo "<pre>".print_r($variable, true)."</pre>";
    $backtrace = debug_backtrace();
		echo '<p>&nbsp;</p><p><a href="#"><strong>'.$backtrace[0]['file'].'</strong> l.'.$backtrace[0]['line'].'</a></p>'; 
		echo "<ol>";
		foreach ($backtrace as $key => $value) {
			if ($key > 0 && $key < 10) {
				echo '<li><strong>'.$value['file'].'</strong> l.'.$value['line'].'</li>'; 
			}
		}
		echo "</ol>";
}

function str_random($length){
    $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}

function sessionStart(){
    if(session_status() == PHP_SESSION_NONE){
        session_start();
      }
}

function loggedOnly(){
	if(!isset($_SESSION['auth'])){
		$loginPage = BASE_URL."/pages/login";
		header("Location: $loginPage");
		exit();
	}
}