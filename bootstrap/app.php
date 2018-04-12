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
		'collation' => 'utf8_general_ci',
		'prefix' => '',
	],
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

	// Get container
	$container = $app->getContainer();
	/*
	$capsule = new \Illuminate\Database\Capsule\Manager;

		$capsule->addConnection($container['settings']['db']);

		$capsule->setAsGlobal();

		$capsule->bootEloquent();

	*/
	
	
	
		$container['db'] = function() {
			return new PDO('mysql:host=localhost;port=3306;dbname=test', 'root', '');
		};


		// Register component on container
		$container['view'] = function ($container) {
		    $view = new \Slim\Views\Twig(__DIR__.'/../application/views', [
		        'cache' => false
		    ]);

		    // Instantiate and add Slim specific extension
		    $basePath = rtrim(str_ireplace('/public/index.php', '', $container['request']->getUri()->getBasePath()), '/');
		    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

		    return $view;
		};

		
	require __DIR__.'/../routes/public.php';
	require __DIR__.'/../routes/api.php';
	require __DIR__.'/../routes/admin.php';

	