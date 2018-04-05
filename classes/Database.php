<?php 



class Database
{
	
	public static function connect()
	{
		
   		
   		try {
   			$path = '/../config.php';
   		$params = include($path);

   		$dsn = 'mysql:host={$params[host]};dbname={$params[dbname]}';
   			$db = new PDO($dsn, $params['user'],$params['password']);
   		} catch (Exception $e) {
   			$e->getMessage();
   		}
   		

   		return $db;
	}
}
 ?>