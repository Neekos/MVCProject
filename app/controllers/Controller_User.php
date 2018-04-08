<?php 

	namespace App\controllers;
	
	use App\models\Model_User;
	use PDO;

	class Controller_User extends Controller
	{
		
		function index($request, $respons)
		{
			$user = $this->c->db->query("SELECT * FROM user")->fetchall(PDO::FETCH_CLASS, Model_User::class);

			return $this->c->view->render($respons , 'container/user.twig', compact('user'));
		}

		function show($request, $respons, $args)
		{
			$user = $this->c->db->prepare("SELECT * FROM user WHERE id = :id ");

			$user->execute([
					'id' => $args['id'],
				]);


			$user = $user->fetch(PDO::FETCH_OBJ);


			if ($user === false) {
				return $this->render404($respons);
			}

			return $this->c->view->render($respons , 'container/one_user.twig', compact('user'));
		}
	}


 ?>