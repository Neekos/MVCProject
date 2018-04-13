<?php 

	namespace App\controllers;

	use PDO;

	class Controller_Topics extends Controller
	{
		
		public function index($request, $response)
		{

			$posts = $this->c->db->query("SELECT * FROM posts ")->fetchall(PDO::FETCH_OBJ);



			return $this->c->view->render($response , 'container/index.twig', compact('posts'));
		}

		public function show($request, $response, $args){
			$post = $this->c->db->prepare("SELECT * FROM posts WHERE id_post = :id_post");
			$post->execute([
					'id_post' => $args['id_post'],
				]);

			$post = $post->fetch(PDO::FETCH_OBJ);

			return $this->c->view->render($response , 'container/show.twig', compact('post'));
		}
	}
	
 ?>