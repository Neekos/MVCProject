<?php 

	namespace App\controllers;

	use PDO;

	
	class Controller_Signup extends Controller
	{
		
		function viewSignup($request, $respons)
		{
			$this->c->view->render($respons, '/public/input/signup.twig');
		}
	}