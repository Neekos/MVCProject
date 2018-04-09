<?php 
session_start();

//require 'kint.php';
//require 'classes/DB.Class.php';
//ini_set('display_errors', 1);
//require_once 'application/bootstrap.php';
	require __DIR__.'/../vendor/autoload.php';

	require __DIR__.'/../bootstrap/app.php'; 


	$app->run();

	
	