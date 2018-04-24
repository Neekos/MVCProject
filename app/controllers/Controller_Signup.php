<?php 

	namespace App\controllers;

	use App\models\Model_User;

	use Respect\Validation\Validator as v;

	use PDO;
	class Controller_Signup extends Controller
	{
		function viewsignup($request, $response)
		{

			$this->c->view->render($response, '/public/input/signup.twig');
		}


		function postSignup($request, $response)
		{

			$validation = $this->c->validator->validate($request, [
				'name' => v::noWhitespace()->notEmpty(),
				'surname' => v::noWhitespace()->notEmpty(),
				'middlename' => v::noWhitespace()->notEmpty(),
				'email' => v::noWhitespace()->notEmpty()->email()->EmailAvailable(),
				'telephon' => v::noWhitespace()->notEmpty(),
				'password' => v::noWhitespace()->notEmpty(),
			]);
			
			if ($validation->failed()) {
				return $response->withRedirect($this->c->router->pathFor('signup'));
			}

		
			$user = $this->c->db->prepare("INSERT INTO user (name , surname , middlename , email , telephon , password) VALUES (:name , :surname , :middlename , :email , :telephon , :password)");

				$params = $request->getParams();

					$user->execute([
					':name' => $params['name'],
					':surname' =>$params['surname'],
					':middlename' =>$params['middlename'],
					':email' =>$params['email'],
					':telephon' =>$params['telephon'],
					':password' =>md5($params['password'])
					]);
					/*
					Model_User::create([
							'name' => $request->getParam('name'),
							'surname' => $request->getParam('surname'),
							'middlename' => $request->getParam('middlename'),
							'email' => $request->getParam('email'),
							'telephon' => $request->getParam('telephon'),
							'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
						]);
						*/
					return $response->withRedirect($this->c->router->pathFor('confirm'));
		}

		function getSignupConfirm($request, $response){
			
			$this->c->view->render($response, '/public/input/signupConfirm.twig');
			
		}

		

		
	}