<?php 
	namespace App\Middleware;

	class OldValidationMiddleware extends Middleware
	{
		
		function __invoke($request , $response , $next)
		{
			$this->container->view->getEnvironment()->addGlobal('old', $_SESSION['old']);

			$_SESSION['old'] = $request->getParams();

			$response = $next($request, $response);

			return $response;
		}
	}
?>