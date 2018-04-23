<?php 
	

	//Пространство имен
	namespace App\models;
	//подключение контейнера
	use Interop\Container\ContainerInterface;

	

	abstract class Model
	{
		
		protected $m;
		//конструктор вызова контейнера
		public function __construct($m)
		{
			$this->m = $m;
		}
	}
 ?>