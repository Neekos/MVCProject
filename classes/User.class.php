<?php 
	class User
	{
		public $id;
		public $username;
		public $hashedPassword;
		public $email;
		public $joinDate;
		//получаем $data из register.php
		function __construct($data)
		{
			//записываем полученные данные в свойства 
			$this->id = (isset($data['id']))? $data['id']: "";
			$this->username = (isset($data['username']))? $data['username']:"";
			$this->hashedPassword = (isset($data['password']))? $data['password']:"";
			$this->email = (isset($data['email']))? $data['email']:"";
			$this->joinDate = (isset($data['join_date']))? $data['join_date']:"";
		}
		//Методы сохранения нового пользователя
		public function save($isNewUser = false){
			$db = new DB;
			$db->connect();

			if (!$isNewUser) {
				$data = array(
					//Обращаеться к открытым свойствам
					"username" => "'$this->username'",
					"password" => "'$this->hashedPassword'",
					"email" => "'$this->email'" 

					);
				//Вызываю метод update который принимает массив и id
				$db->update($data, 'user', 'id = '.$this->id);
			}else{
				$data = array(
					"username" => "'$this->username'",
					"password" => "'$this->hashedPassword'",
					"email" => "'$this->email'",
					"join_date" => "'".date("Y-m-d H:i:s",time())."'", 
					);
				$this->id= $db->insert($data, 'user');
				$this->joinDate = time();
			}
			return true;
		}
	}
?>