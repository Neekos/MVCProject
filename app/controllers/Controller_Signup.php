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

					$name = $_POST['name'];
					$surname = $_POST['surname'];
					$middlename = $_POST['middlename'];
					$email = $_POST['email'];
					$password = $_POST['password'];

					$user->bindValue(':name', $name);
					$user->bindValue(':surname', $surname);
					$user->bindValue(':middlename', $middlename);
					$user->bindValue(':email', $email);
					$user->bindValue(':password', $password);

					$user->execute();
					//'name' => $request->getParam('name'),
					//'surname' => $request->getParam('surname'),
					//'middlename' => $request->getParam('middlename'),
					//'email' => $request->getParam('email'),
					//'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),


			return $response->withRedirect($this->c->router->pathFor('home'));
		}

		function getSignupConfirm($request, $response){
			$this->c->view->render($response, '/public/input/signupConfirm.twig');
		}

		

		
	}