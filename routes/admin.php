<?php 

	//Шаблон
	$app->get('/admin', function($request, $respons){
			return $respons->withRedirect('admin/main/');
			return $this->view->render($respons, 'layouts/admin.twig');
	});

	//Главная админки
	$app->group('/admin/main', function(){
			$this->get('/', function($request, $respons, $args){
				$user = $this->db->query("SELECT * FROM user")->fetchall(PDO::FETCH_OBJ);
				return $this->view->render($respons, 'admin/main/main.twig', compact('user'));
			})->setName('main');
	});
	//Новости админки
	$app->group('/admin/news', function(){
			$this->get('/', function($request, $respons){
				$article = $this->db->query("SELECT * FROM article")->fetchall(PDO::FETCH_OBJ);
				return $this->view->render($respons, 'admin/news/news.twig', compact('article'));
			})->setName('admin.news');
	});
	//галерея админки
	$app->group('/admin/galereya', function(){
			$this->get('/', function($request, $respons){
				return $this->view->render($respons, 'admin/galereya/galereya.twig');
			})->setName('admin.galereya');
	});
	$app->group('/admin/price', function(){
			$this->get('/', function($request, $respons){
				return $this->view->render($respons, 'admin/price/price.twig');
			})->setName('admin.price');
	});
	//акции админки
	$app->group('/admin/akcyi', function(){
			$this->get('/', function($request, $respons){
				return $this->view->render($respons, 'admin/akcyi/akcyi.twig');
			})->setName('admin.akcyi');
	});
	//о нас админки
	$app->group('/admin/us', function(){
			$this->get('/', function($request, $respons){
				return $this->view->render($respons, 'admin/us/us.twig');
			})->setName('admin.us');
	});