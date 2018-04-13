<?php 

	namespace App\controllers;

	use PDO;

	
	class HomeController extends controller
	{
		
		function index($request, $response)
		{
			$article = $this->c->db->query("SELECT * FROM article LIMIT 3")->fetchall(PDO::FETCH_OBJ);
			$image = $this->c->db->query("SELECT * FROM image LIMIT 12")->fetchall(PDO::FETCH_OBJ);
			return $this->c->view->render($response, 'public/home/home.twig', compact('article', 'image'));
		}
	}