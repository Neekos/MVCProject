<?php 

	namespace App\models;

	use Interop\Container\ContainerInterface;

	abstract class Model
	{
		
		protected $model;

		public function __construct($model)
		{
			$this->model = $model;
		}

	}