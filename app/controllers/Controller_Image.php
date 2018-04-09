<?php 

 namespace App\controllers;
 use App\models\Model_Image;
 use PDO;

 
 class Controller_Image extends Controller
 {
 	
 	function getAllImage($request, $respons)
 	{
 		$images = $this->c->db->query("SELECT * FROM image ")->fetchall(PDO::FETCH_CLASS, Model_Image::class);
		return $this->c->view->render($respons, 'public/galereya/galereya.twig', compact('images'));
 	}

 	function getOneImage($request, $respons, $args)
 	{
 		# code...
 	}
 }