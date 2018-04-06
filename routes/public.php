<?php 

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