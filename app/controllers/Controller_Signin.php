<?php 
	
	namespace App\controllers;

	use PDO;

	
	class Controller_Signin extends Controller
	{
		
		function view($request, $respons)
		{
			$this->c->view->render($respons, 'input/signin.twig');
		}
	}