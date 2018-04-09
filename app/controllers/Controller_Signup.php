<?php 

	namespace App\controllers;

	use PDO;

	
	class Controller_Signup extends Controller
	{
		
		function viewSignup($request, $respons)
		{
			$this->c->view->render($respons, '/public/input/signup.twig');
		}

		function getSignupConfirm($request, $respons){
			$this->c->view->render($respons, '/public/input/signupConfirm.twig');
		}

		function redirectSignupConfirm($request, $respons){
			return $respons->withRedirect('/signup/confirm/');
		}

		function actionRegister($request, $respons)
		{
			if (isset($_POST['submit'])) {
				$name = $_POST['name'];
				$surName = $_POST['surName'];
				$middleName = $_POST['middleName'];
				$password = $_POST['password'];

				if (isset($name)) {
					# code...
				}
			}

			$this->c->view->render($respons, '/public/input/signup.twig');
		}

	}