<?php  
	class UserTools{
		//Метод login
		public function login($username, $password)
		{
			//Присваеваем хешированный пароль
			$hashedPassword = md5($password);
			//Делаю запрос
			$result = mysql_query("SELECT * FROM user WHERE username = '$username' AND password = '$hashedPassword'" );
			//условие проверки 
			if (mysql_num_rows($result) == 1) 
			{
				//Записываем в сессию наш результат
				//Генерирует пригодное для хранения представление переменной.
				//Это полезно для хранения или передачи значений PHP между скриптами без потери их типа и структуры.
				$_SESSION['user'] = serialize(new User(mysql_fetch_assoc($result)));
				$_SESSION['login_time'] = time();
				$_SESSION['logged_in'] = 1;
				return true;
			}else{
				return false;
			}
		}
		
		//Методо разъединения
		public function logout(){
			//Удаление сессии
			unset($_SESSION['user']);
			unset($_SESSION['login_time']);
			unset($_SESSION['logged_in']);
			session_destroy();
		}
		//Проверка пользователя
		public function checkUsernameExists($username){
			//Запрос на добавления
			$result = mysql_query("SELECT id FROM user WHERE username = '$username'");
			if (mysql_fetch_assoc($result) == 0) {
				return false;
			}else{
				return true;
			}
		}
		//Получаем id
		public function get($id){
			//Создаю объект Базы
			$db = new DB;
			$db->connect();
			//вызываем метод селект
			$result = $db->select('user', "id = '$id'");

			return new User($result);
		}
	}
?>