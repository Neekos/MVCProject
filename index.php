<?php
session_start();

require 'kint.php';
require 'classes/DB.Class.php';
ini_set('display_errors', 1);
//require_once 'application/bootstrap.php';

include __DIR__.'/vendor/autoload.php';


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
    $view = new \Slim\Views\Twig(__DIR__.'/application/views', [
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
	};

	$app->get('/', function ($request, $response) use($app) {

		$posts = $this->db->query('SELECT * FROM posts')->fetchAll(PDO::FETCH_OBJ);
		return $this->view->render($response, 'layouts/app.twig');
	});

	$app->get('/article/{id_post}', function ($request, $response, $args) use($app) {

		$article = $this->db->prepare('SELECT * FROM posts WHERE id_post = :id_post');
		$article -> execute([
				'id_post' => $args['id_post'],
			]);
		$article = $article->fetch(PDO::FETCH_OBJ);
		return $this->view->render($response, 'article_view.twig',[
				'article' => $article
			]);
	});

	$app->get('/home', function ($request, $response) {
		return $this->view->render($response, 'home_view.twig');
	})->setName('home');

	$app->get('/admin', function ($request, $response) {
		return $this->view->render($response, 'admin_view.twig');
	})->setName('admin');

	$app->get('/contact', function($request, $response){
		return $this->view->render($response, 'contact_view.twig');
	});

	$app->get('/contact/confirm', function($request, $response){
		return $this->view->render($response, 'contact_confirm_view.twig');
	});

	$app->post('/contact', function($request, $response){
		return $response->withRedirect('http://mvcproject:81/contact/confirm');
	})->setName('contact');

	$app->get('/user[/{id}]', function ($request, $response, $args) {
		$user = [
			'id' => $args['id'],
			'username'=>'alex',
		];

		return $this->view->render($response, 'user_view.twig',compact('user'));

	})->setName('user.id');

	$app->group('/topics', function(){
		$this->get('', function(){
			echo 'Topic list';
		});

		$this->get('/{id}', function($request, $response, $args){
			echo 'Topic'. $args['id'];
		});

		$this->post('', function(){
			echo 'Topic post';
		});


	});

	$app->run();

