<?php 
    	
	namespace App\controllers;



	class AuthController extends Controller
	{
		
		function getSignUp($request, $response)
		{
			
			$this->c->view->render($response, '/public/input/signup.twig');
		}

		function postSignUp()
		{
			
		}
	}

 ?>