<?php 

	namespace App\Middleware;

	use PDO;

	
	class IpFilter
	{
		
		protected $db;

		public function __construct(PDO $db)
		{
			$this->db = $db;
		}

		public function __invoke($request, $response, $next)
		{
			return $next($request , $response);
		}

	}