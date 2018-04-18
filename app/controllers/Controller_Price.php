<?php 

	namespace App\controllers;

	use PDO;

	class Controller_Price extends Controller
	{
		
		function ShowPriceAll($request, $response)
		{
			$price = $this->c->db->query("SELECT * FROM servers ")->fetchall(PDO::FETCH_OBJ);

			return $this->c->view->render($response , 'public/price/price.twig' , compact('price'));
		}

		function showPriceOne($request, $response , $args)
		{
			$prices = $this->c->db->prepare("SELECT * FROM servers, day_of_the_week, time_of_lessons, number_of_lessons, price where servers.id=:id");
			$prices->execute([
				'id'=>$args['id'],
				]);

			$prices = $prices->fetch(PDO::FETCH_OBJ);

			return $this->c->view->render($response , 'public/price/OnePrice.twig' , compact('prices'));
		}

		function zapis($request, $response)
		{

			return $this->c->view->render($response , 'public/price/zapis.twig');
		}
	}


 ?>