<?php 
	
	namespace App\controllers;

	use PDO;

	
	class Controller_Signin extends Controller
	{
		
		function viewSignin($request, $respons)
		{
			$this->c->view->render($respons, '/public/input/signin.twig');
		}
	}