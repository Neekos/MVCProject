<?php 
	
	use App\controllers\Controller_Articles;
	use App\controllers\Controller_Image;
	use App\controllers\Controller_Signup;
	use App\controllers\Controller_Signin;
	use App\models\Model_Image;
	use App\models\Model_Article;
	
	//Шаблон
	$app->get('/', function($request, $respons){
			return $respons->withRedirect('/home/');
			return $this->view->render($respons, 'layouts/app.twig');
	});

	//Регистрация
	$app->group('/signup', function() {

			$this->get('/', Controller_Signup::class .':viewSignup')->setName('signup');
			$this->get('/confirm/', Controller_Signup::class .':getSignupConfirm');
			$this->post('/', Controller_Signup::class .':redirectSignupConfirm')->setName('signup');
	});

	//авторизация
	$app->group('/signin', function() {

			$this->get('/', Controller_Signin::class .':viewSignin')->setName('signin');
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
