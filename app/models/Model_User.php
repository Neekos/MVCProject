<?php 
	
	namespace App\models;

	use Illuminate\Database\Eloquent\Model;

 	use PDO;
	class Model_User extends Model
	{

		protected $table = 'user';

		protected $fillable  = [

			'name',
			'surname',
			'middlename',
			'email',
			'telephon',
			'password',
			'date_join'
		];

		
	}
?>