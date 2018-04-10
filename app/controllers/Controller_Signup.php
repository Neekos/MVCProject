<?php 

	namespace App\controllers;

	use App\models\Model_Signup; 
	use PDO;

	
	class Controller_Signup extends Controller
	{
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
						$errors[] = 'Ошибка в имени';
					}

					if (Model_Signup::CheckSurName($surName)) {
						$errors[] = 'Ошибка в фамилии';
					}

					if (Model_Signup::CheckMiddleName($middleName)) {
						$errors[] = 'Ошибка в отчетсве';
					}

					if (Model_Signup::CheckEmail($email)) {
						$errors[] = 'Ошибка в майле';
					}

					if (Model_Signup::CheckPassword($password)) {
						$errors[] = 'Ошибка в пароле';
					}

					if (Model_Signup::CheckPasswordConfirm($passwordConfirm)) {
						$errors[] = 'Ошибка в повторном пароле';
					}

				$this->postSignup($request, $respons);


			}

			$this->c->view->render($respons, '/public/input/signup.twig');
		}

		
		function viewSignup($request, $respons)
		{
			$this->c->view->render($respons, '/public/input/signup.twig');
		}
		function redirectSignupConfirm($request, $respons){
			return $respons->withRedirect('/signup/confirm/');
		}

		function postSignup($request, $respons)
		{
			$this->redirectSignupConfirm($request, $respons);
			return "Данные отправлены!";

			$this->c->view->render($respons, '/public/input/signup.twig');
		}

		function getSignupConfirm($request, $respons){
			$this->c->view->render($respons, '/public/input/signupConfirm.twig');
		}

		

		
	}