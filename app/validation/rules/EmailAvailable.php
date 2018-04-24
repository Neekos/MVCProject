<?php 
	
	namespace App\validation\rules;

	use Respect\Validation\Rules\AbstractRule;

	use App\models\Model_User;

	class EmailAvailable extends AbstractRule
	{
		
		public function validate($input)
		{
			return true;//Model_User::where('email', $input)->count() === 0 ;

		}
	}

?>