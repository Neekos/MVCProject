<?php 
	
	use App\controllers\Controller_Articles;
	use App\controllers\Controller_Image;
	use App\models\Model_Image;
	use App\models\Model_Article;
	
	//Шаблон
	$app->get('/', function($request, $respons){
			return $respons->withRedirect('/home/');
			return $this->view->render($respons, 'layouts/app.twig');
	});

	//Главная
	$app->group('/home', function(){
			$this->get('/', function($request, $respons){
				return $this->view->render($respons, 'public/home/home.twig');
			})->setName('home');
	});

	//Новости
	$app->group('/news', function() {

			$this->get('/', Controller_Articles::class .':getAll')->setName('news');
			$this->get('/{id}', Controller_Articles::class .':getОne')->setName('article.getOne');
			//$this->get('/', function($request, $respons){
			//	return $this->view->render($respons, 'public/news/news.twig');
			//})->setName('news');
	});

	//Галерея
	$app->group('/galereya', function(){

			$this->get('/', Controller_Image::class .':getAllImage')->setName('galereya');
			//$this->get('/', function($request, $respons){
			//	return $this->view->render($respons, 'public/galereya/galereya.twig');
			//})->setName('galereya');
	});

	//Прасы
	$app->group('/price', function(){
			$this->get('/', function($request, $respons){
				return $this->view->render($respons, 'public/price/price.twig');
			})->setName('price');
	});

	//Акции
	$app->group('/akcyi', function(){
			$this->get('/', function($request, $respons){
				return $this->view->render($respons, 'public/akcyi/akcyi.twig');
			})->setName('akcyi');
	});

	//О нас
	$app->group('/us', function(){
			$this->get('/', function($request, $respons){
				return $this->view->render($respons, 'public/us/us.twig');
			})->setName('us');
	});
