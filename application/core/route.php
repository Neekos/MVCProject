<?php

/**
* route
*/
class Route
{
	
	static function start()
	{
		//контрллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';

		$routes = explode('/', $_SERVER['REQUEST_URL']);

		//Получаем имя контроллера
		if (!empty($routes[1])) {
			$controller_name = $routes[1];
		}

		//Поулчаем имя акшена
		if (!empty($routes[2])) {
			$action_name = $routes[2];
		}

		//Добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;


		//подцепляем файл с классом модели(фаил может быть и не быть)
		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;

		if (file_exists($model_path)) {
			include "application/models/".$model_file;
		}

		//подцепляем фаил с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if (file_exists($controller_path)) {
			include "application/controllers/".$controller_file;
		}else{
			Route::ErrorPage404();
		}

		//Создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;

		if (method_exists($controller, $action)) {
			//Вызываю действие контроллера
			$controller->$action();
		}else{
			Route::ErrorPage404();
		}



	}

	function ErrorPage404(){
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
		header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('location:'.$host.'404');
	}
}