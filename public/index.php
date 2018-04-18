<?php 
	//подключение отладки кода
	require 'kint.php';
	//подключение подгружаемых библиотек
	require __DIR__.'/../vendor/autoload.php';
	//подключение конфигурационного файла bootstrap/app.php
	require __DIR__.'/../bootstrap/app.php'; 

	//запуск slim
	$app->run();

	
	