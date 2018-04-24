<?php 

	namespace App\controllers;

	use PDO;

	
	class HomeController extends controller
	{
		
		function index($request, $response)
		{
			$article = $this->c->db->query("SELECT * FROM article ORDER BY date_time DESC LIMIT 3 ")->fetchall(PDO::FETCH_OBJ);
			$image = $this->c->db->query("SELECT * FROM image LIMIT 12")->fetchall(PDO::FETCH_OBJ);


			 var_dump($user);
			
			return $this->c->view->render($response, 'public/home/home.twig', compact('article', 'image'));

			 
		}
	}