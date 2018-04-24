<?php 
	
	namespace App\validation\rules;

	use Respect\Validation\Exceptions\ValidationException;

	class EmailAvailableException extends ValidationException
	{
		
		public static $defaultTemplates = [
			self::MODE_DEFAULT => [
				self::STANDARD => 'Такой Email уже существует',
			],
		];
	}

?>