<?php 

namespace App\controllers;

use App\models\Model_Article;

use PDO;


class Controller_Articles extends Controller
{
	
	function getAll($request, $respons)
	{
		$articles = $this->c->db->query("SELECT * FROM article")->fetchall(PDO::FETCH_CLASS , Model_Article::class);
		return $this->c->view->render($respons, 'public/news/news.twig', compact('articles'));		
	}

	function getОne($request, $respons, $args)
	{
		$article = $this->c->db->prepare("SELECT * FROM article WHERE id = :id");

			$article->execute([
					'id' => $args['id'],
				]);


			$article = $article->fetch(PDO::FETCH_OBJ);


			if ($article === false) {
				return $this->render404($respons);
			}

		return $this->c->view->render($respons, 'public/news/show.twig', compact('article'));		
	}	
}