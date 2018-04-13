<?php 

	namespace App\controllers;
	
	use App\models\Model_User;
	use PDO;

	class Controller_User extends Controller
	{
		
		function index($request, $response)
		{
			$user = $this->c->db->query("SELECT * FROM user")->fetchall(PDO::FETCH_CLASS, Model_User::class);

			return $this->c->view->render($response , 'container/user.twig', compact('user'));
		}

		function show($request, $response, $args)
		{
			$user = $this->c->db->prepare("SELECT * FROM user WHERE id = :id ");

			$user->execute([
					'id' => $args['id'],
				]);


			$user = $user->fetch(PDO::FETCH_OBJ);


			if ($user === false) {
				return $this->render404($response);
			}

			return $this->c->view->render($response , 'container/one_user.twig', compact('user'));
		}
	}


 ?>