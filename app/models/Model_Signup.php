<?php 

	namespace App\models;

	class Model_Signup
	{
		
		public static function CheckName($name)
		{
			if (strlen($name) >= 2) {
				return true;
			}

			return false;
		}

		public static function CheckSurName($surName)
		{
			if (strlen($name) >= 2) {
				return true;
			}

			return false;
		}

		public static function CheckMiddleName($middleName)
		{
			if (strlen($name) >= 2) {
				return true;
			}

			return false;
		}

		public static function CheckPassword($password)
		{
			if (strlen($password) >= 6) {
				return true;
			}

			return false;
		}

		public static function CheckPasswordConfirm($passwordConfirm)
		{
			if ($passwordConfirm == $password) {
				return true;
			}

			return false;
		}

		public static function CheckEmail($email)
		{
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				return true;
			}

			return false;
		}
	}