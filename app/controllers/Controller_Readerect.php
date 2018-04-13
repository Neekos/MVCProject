<?php 
	
	namespace App\controllers;


	class Controller_Readerect extends Controller
	{
		
		function stor($request, $response, $args)
		{	
			//return $respons->withRedirect('http://mvcproject:81/public/show');

			return $respons->withRedirect($this->c->router->pathFor('store.show', ['id' => 5] ));

			return $this->c->view->render($response, 'readerect/stor.twig');
		}

		function show($request, $response, $args)
		{	

			return "show show" . $args['id'];
			return $this->c->view->render($response, 'readerect/show.twig');	
		}
	}
?>