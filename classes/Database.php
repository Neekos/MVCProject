<?php 



class Database
{
	/*

   */
	public static function connect()
	{
		$host = 'localhost';
      $user = 'root';
      $pass = '';
      $dbname = 'test';
   		
   		try {
   			$db = new PDO('mysql:host=127.0.0.1;port=3306;dbname=test', $user, $pass);
                        return $db;
   		} catch (Exception $e) {
   			$e->getMessage();
   		}

	}
}
 ?>