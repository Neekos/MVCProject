<?php 
	include "/classes/User.class.php";
	include "/classes/UserTools.class.php";
	include "/classes/DB.class.php";


	//вызываем подключение к базе
	$db = new DB();
	$db->connect();


	$userTools = new UserTools();

	//старт сессии
	//session_start();


	if(isset($_SESSION['logged_in'])) {
		
	$user = unserialize($_SESSION['user']);
	$_SESSION['user'] = serialize($userTools->get($user->id));
	}
?>