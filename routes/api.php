<?php 

 //Шаблон
	$app->get('/test', function($request, $respons){
			return $this->view->render($respons, 'layouts/test.twig');
	});

	