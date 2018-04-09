<?php 

	namespace App\contollers;

	use PDO;

	
	class Controller_Signup extends Controller
	{
		
		function view($request, $respons)
		{
			$this->c->view->render($respons, 'input/signup.twig');
		}
	}