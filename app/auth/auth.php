<?php 
	namespace App\auth;

	use App\models\Model_User;

	class auth
	{
		
		public function user(){
			return //найти $_SESSION['user']
		}

		public function chek(){
			return isset($_SESSION['user']);
		}

		public function attempt($email, $password)
		{
			$user = //Запрос узера где узур

			if (!$user) {
				return false;
			}

			if (password_verify($password, $user->password)) {

				$_SESSION['user'] $user->id;
				return true;
			}

			return false;
		}
	}
	
 ?>