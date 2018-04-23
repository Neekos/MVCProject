<?php 
	
	//Подключаю Контроллеры Модули и необходимое
	use App\controllers\Controller_Articles;
	use App\controllers\Controller_Image;
	use App\controllers\Controller_Signup;
	use App\controllers\Controller_Signin;
	use App\controllers\HomeController;
	use App\controllers\Controller_Price;
	use App\middleware\ipFilter;
	use App\middleware\RedirectIFUnauthenticade;
	use App\models\Model_Image;
	use App\models\Model_Article;

	//Пример как должна выгдлядеть регистрация авторизация
	/*
	$app->get('/top', TopicController::class . 'index');

	$app->group('' function){
		$this->get('/top/create', TopController::class . ':create');
		$this->get('/top/{id}', TopcController::class . ':show' );
	})->add(new RedirectIFUnauthenticade($container['router']));
	
	$app->group('' function){
		$this->get('/login', AuthController::class . ':login');
		$this->get('/register', RegisterController::class . ':register' );
	})->add(new RedirectIFAuthenticade($container['router']));
	-----------------------------------------------------------------------------
	$app->(new ipFilter($container['db']));

	$app->('', function(){
		return "home";
	});

	$app->('/login', function(){
		return "login";
	});
	*/
	
	//Шаблон
	$app->get('/', function($request, $response){
			//Ридеректим на главную
			return $response->withRedirect('/home/');
			//отображаем шаблон header and footer
			return $this->view->render($response, 'layouts/app.twig');
	});

	//Регистрация
	$app->group('/signup', function() {
			//Отображение формы регистрации
			$this->get('/', Controller_Signup::class .':viewsignup')->setName('signup');
			//передача данных методом post
			$this->post('/', Controller_Signup::class .':postSignup')->setName('signuppost');
			//Отображение подтверждения
			$this->get('/confirm/', Controller_Signup::class .':getSignupConfirm')->setName('confirm');
	});

	//авторизация
	$app->group('/signin', function() {
			//отображение формы авторизации
			$this->get('/', Controller_Signin::class .':viewSignin')->setName('signin');
			//передача данных методом post
			$this->post('/', Controller_Signin::class .':postSignin')->setName('signin');
	});

	//Главная
	$app->group('/home', function(){
			//Отображение элементов главной страницы
			$this->get('/', HomeController::class .':index')->setName('home');
	});

	//Новости
	$app->group('/news', function() {
			//Отображение всех новостей
			$this->get('/', Controller_Articles::class .':getAll')->setName('news');
			//Отображение одной новости
			$this->get('/{id}', Controller_Articles::class .':getОne')->setName('article.getOne');
	});

	//Галерея
	$app->group('/galereya', function(){
			//отображение фотогалереи
			$this->get('/', Controller_Image::class .':getAllImage')->setName('galereya');
	});

	//Прайсы
	$app->group('/price', function(){
			//отображение всех услуг
			$this->get('/', Controller_Price::class .':showPriceAll')->setName('price');
			//отображение одной услуги
			$this->get('/{id}/', Controller_Price::class .':showPriceOne')->setName('price.showPriceOne');
			//отображение формы записи на услугу
			$this->get('/zapis', Controller_Price::class .':zapis')->setName('zapis');
			//передача данных о записи методом post
			$this->post('/zapis', Controller_Price::class .':zapis')->setName('zapis');
	});

	//Акции
	$app->group('/akcyi', function(){
			//отображение имеющихся акциий
			$this->get('/', function($request, $response){
				return $this->view->render($response, 'public/akcyi/akcyi.twig');
			})->setName('akcyi');
	});

	//О нас
	$app->group('/us', function(){
			//отображение информации о организации
			$this->get('/', function($request, $response){
				return $this->view->render($response, 'public/us/us.twig');
			})->setName('us');
	});
