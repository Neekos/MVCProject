<?php 
	
	namespace App\controllers;


	class Controller_Readerect extends Controller
	{
		
		function stor($request, $respons, $args)
		{	
			//return $respons->withRedirect('http://mvcproject:81/public/show');

			return $respons->withRedirect($this->c->router->pathFor('store.show', ['id' => 5] ));

			return $this->c->view->render($respons, 'readerect/stor.twig');
		}

		function show($request, $respons, $args)
		{	

			return "show show" . $args['id'];
			return $this->c->view->render($respons, 'readerect/show.twig');	
		}
	}
?>