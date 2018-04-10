<?php 

namespace App\middleware;

use Interop\Container\ContainerInterface;
use Slim\Interfaces\RouterInterface;

class RedirectUnauthenticade
{
	private $router;

	function __construct($router)
	{
		$this->router = $router;
	}

	function __invoke($request, $response, $next)
	{
		if (!isset($_SESSION['user_id'])) {
			$response = $response->withRedirect($this->c->router->pathFor('login'));
		}

		return $next($request, $response);
	}


}