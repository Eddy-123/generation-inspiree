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

function getUsernameFromArray($users, $id){
	$continue = true;
	foreach($users as $user){
		if($user['id'] == $id){
			$username = $user['username'];
		break;
		}
	}
	return $username;
}

function translateDate($date){
	/*$s = '8/29/2011 11:16:12 AM';
	$dt = new DateTime($s);

	$date = $dt->format('m/d/Y');
	$time = $dt->format('H:i:s');

	echo $date, ' | ', $time;
	*/
	//$controller = new Controller();
	if(preg_match("#^(?P<year>[0-9]+)-(?P<month>[0-9]+)-(?P<day>[0-9]+).*$#", $date, $match))
	{
		$day = $match['day'];
		$month = $match['month'];
		$year = $match['year'];

		switch($month){
			case 1 :
				$month = "Janvier";
			break;
			case 2 :
				$month = "Février";
			break;
			case 3 :
				$month = "Mars";
			break;
			case 4 :
				$month = "Avril";
			break;
			case 5 :
				$month = "Mai";
			break;
			case 6 :
				$month = "Juin";
			break;
			case 7 :
				$month = "Juillet";
			break;
			case 8 :
				$month = "Août";
			break;
			case 9 :
				$month = "Septembre";
			break;
			case 10 :
				$month = "Octobre";
			break;
			case 11 :
				$month = "Novembre";
			break;
			case 12 :
				$month = "Décembre";
			break;
			default:
				$month = "";
			break;
		}
	}
	$date = $day." ".$month." ".$year;
	return $date;
}