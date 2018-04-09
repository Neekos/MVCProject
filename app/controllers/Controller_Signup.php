<?php 

	namespace App\controllers;

	use App\models\Model_Signup; 
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

			$name = '';
			$surName = '';
			$middleName = '';
			$password = '';

			if (isset($_POST['submit'])) {
				$name = $_POST['name'];
				$surName = $_POST['surName'];
				$middleName = $_POST['middleName'];
				$password = $_POST['password'];

				$errors = false;

				if (Model_Signup::CheckName($name)) {
					$errors[] = 'Ошибка';
				}
			}

			$this->c->view->render($respons, '/public/input/signup.twig');
		}

	}