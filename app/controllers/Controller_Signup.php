<?php 

	namespace App\controllers;

	use App\models\Model_User;

	use PDO;
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
			$user = $this->c->db->prepare("INSERT INTO user (name , surname , middlename , email , telephon , password) VALUES (:name , :surname , :middlename , :email , :telephon , :password)");

				$params = $request->getParams();

				//$user->bindParam(':name', $params['name'], PDO::PARAM_STR, 255);
				//$user->bindValue(':surname', "%{$params['surname']}%");
				//$user->bindValue(':middlename', $params['middlename']);
				//$user->bindValue(':email', $params['email']);
				//$user->bindValue(':password', $params['password']);

				$user->execute([
					':name' => $params['name'],
					':surname' =>$params['surname'],
					':middlename' =>$params['middlename'],
					':email' =>$params['email'],
					':telephon' =>$params['telephon'],
					':password' =>md5($params['password'])
					]);

				
					
			return $response->withRedirect($this->c->router->pathFor('confirm'));
		}

		function getSignupConfirm($request, $response){
			
			$this->c->view->render($response, '/public/input/signupConfirm.twig');
			
		}

		

		
	}