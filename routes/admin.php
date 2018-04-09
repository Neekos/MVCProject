<?php 

	//Шаблон
	$app->get('/admin', function($request, $respons){
			return $respons->withRedirect('admin/main/');
			return $this->view->render($respons, 'layouts/app.twig');
	});

	//Главная
	$app->group('/admin/main', function(){
			$this->get('/', function($request, $respons){
				return $this->view->render($respons, 'admin/main/main.twig');
			})->setName('home');
	});