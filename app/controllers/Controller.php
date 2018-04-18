<?php 
	//Пространство имен
	namespace App\controllers;
	//подключение контейнера
	use Interop\Container\ContainerInterface;

	abstract class Controller
	{
		
		protected $c;
		//конструктор вызова контейнера
		public function __construct($c)
		{
			$this->c = $c;
		}
		//функция вызова ошибки 404
		protected function render404($response){

			return $this->c->view->render($response->withStatus(404), 'errors/404.twig');
		}
	}
 ?>