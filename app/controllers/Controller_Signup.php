<?php 

	namespace App\controllers;

	use App\models\Model_User;

	
	class Controller_Signup extends Controller
	{
		function actionRegister($request, $response)
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

				$this->postSignup($request, $response);


			}

			$this->c->view->render($response, '/public/input/signup.twig');
		}

		
		function viewSignup($request, $response)
		{
			$this->c->view->render($response, '/public/input/signup.twig');
		}
		function redirectSignupConfirm($request, $response){
			return $response->withRedirect('/signup/confirm/');
		}

		function postSignup($request, $response)
		{
			$user = $this->c->db->prepare("INSERT INTO user (name , surname, middlename, email, password) VALUES (:name, :surname, :middlename, :email, :password)");

				$params = $request->getParams();

				$user->bindValue(':name', $params['name']);
				$user->bindValue(':surname', $params['surname']);
				$user->bindValue(':middlename', $params['middlename']);
				$user->bindValue(':email', $params['email']);
				$user->bindValue(':password', $params['password']);

				$user->execute();
				d($params);
				die();
					
			//return $response->withRedirect($this->c->router->pathFor('home'));
		}

		function getSignupConfirm($request, $response){
			$this->c->view->render($response, '/public/input/signupConfirm.twig');
		}

		

		
	}