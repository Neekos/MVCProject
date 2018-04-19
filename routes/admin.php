<?php 

	//Шаблон
	$app->get('/admin', function($request, $respons){
			return $respons->withRedirect('admin/main/');
			return $this->view->render($respons, 'layouts/admin.twig');
	});

	//Главная админки
	$app->group('/admin/main', function(){
			$this->get('/', function($request, $respons){
				return $this->view->render($respons, 'admin/main/main.twig');
			})->setName('main');
	});
	//Новости админки
	$app->group('/admin/news', function(){
			$this->get('/', function($request, $respons){
				return $this->view->render($respons, 'admin/news/news.twig');
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