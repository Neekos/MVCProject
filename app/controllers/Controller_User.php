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
	}


 ?>