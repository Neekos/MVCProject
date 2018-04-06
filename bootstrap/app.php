<?php 

$app = new \Slim\App([
	'settings' =>[
		'displayErrorDetails' => true,
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

	// Get container
	$container = $app->getContainer();
	
	$container['db'] = function() {
		return new PDO('mysql:host=localhost;port=3309;dbname=test', 'root', '');
	};

	// Register component on container
	$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__.'/../application/views', [
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
	};

	require __DIR__.'/../routes/public.php';