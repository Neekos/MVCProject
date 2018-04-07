<?php 
	
	namespace App\controllers;

	use Interop\Container\ContainerInterface;

	abstract class Controller
	{
		
		protected $c;

		function __construct(ContainerInterface $c)
		{
			$this->c = $c;
		}
	}
 ?>