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
			$price = $this->c->db->prepare("SELECT * FROM servers, date_of_the_week, time_of_lesson, number_of_lesson, price where id=:id");
			$price->execute([
				'id'=>$args['id'],
				]);

			$price = $price->fetch(PDO::FETCH_OBJ);

			return $this->c->view->render($response , 'public/price/OnePrice.twig' , compact('price'));
		}

		function zapis($request, $response)
		{

			return $this->c->view->render($response , 'public/price/zapis.twig');
		}
	}


 ?>