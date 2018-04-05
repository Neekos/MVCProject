<?php 
function __autoload($var){
	require_once 'core/'.$var.'.php';
}


//require_once 'core/model.php';
//require_once 'core/view.php';
//require_once 'core/controller.php';
//require_once 'core/route.php';
Route::start();