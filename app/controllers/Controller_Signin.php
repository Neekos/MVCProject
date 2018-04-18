<?php 
	
	namespace App\controllers;

	use PDO;

	
	class Controller_Signin extends Controller
	{
		
		function viewSignin($request, $response)
		{
			$this->c->view->render($response, '/public/input/signin.twig');
		}

		function postSignin($request, $response)
		{
			return $response->withRedirect($this->c->router->pathFor('home'));
		}
	}