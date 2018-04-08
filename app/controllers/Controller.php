<?php 
	
	namespace App\controllers;

	use Interop\Container\ContainerInterface;

	abstract class Controller
	{
		
		protected $c;

		public function __construct(ContainerInterface $c)
		{
			$this->c = $c;
		}

		protected function render404($respons){

			return $this->c->view->render($respons->withStatus(404), 'errors/404.twig');
		}
	}
 ?>