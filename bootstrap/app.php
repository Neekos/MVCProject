<?php 

session_start();

$app = new \Slim\App([
	'settings' =>[
		'displayErrorDetails' => true,
	],

	'db' => [
		'driver' => 'mysql',
		'host' => 'localhost',
		'database' => 'test',
		'port' => '3306',
		'username' => 'root',
		'password' => '',
		'charset' => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix' => '',
	]
]);
/*
$container = $app->getContainer();

$container['view'] = function(){
	$view = new \Slim\Views\Twig(__DIR__.'/application/views',[
		'cache' => false
		]);
$basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
$view->addExtension(new Slim\Views\TwigExtension($container['roter'], $basePath));

return $view;

};
*/

	//Получаю контейнер
	$container = $app->getContainer();

	

	//$capsule = new \Illuminate\Database\Capsule\Manager;

	//$capsule->addConnection($container['db']);

	//$capsule->setAsGlobal();

	//$capsule->bootEloquent();
	


	
	
		//контейнер подключение базы данных
		$container['db'] = function($container){
			return new PDO('mysql:host=localhost;port=3306;dbname=test', 'root', '');
		};


		//создаем контайнер отображения шаблонов
		$container['view'] = function ($container) {
			//задаем путь где будут лежать шаблоны
		    $view = new \Slim\Views\Twig(__DIR__.'/../application/views', [
		        'cache' => false
		    ]);
		    //добавляем расширение twig
		    $basePath = rtrim(str_ireplace('/public/index.php', '', $container['request']->getUri()->getBasePath()), '/');
		    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

		    return $view;
		};

	//подключение роутер отображения сайта	
	require __DIR__.'/../routes/public.php';
	//подключение роутер отвечающий за добавление, удаление и редактирования данных
	require __DIR__.'/../routes/api.php';
	//подключение роутера отображения административной панели
	require __DIR__.'/../routes/admin.php';

	