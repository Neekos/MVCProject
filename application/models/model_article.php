<?php 
	/**
	* article
	*/
	class Model_Article extends Model
	{
		
		public function get_data()
		{
			return array(
					array(
						'Year'=> '2018',
						'Article'=> 'MVC патерн',
						'discription'=>'Описание'

						),

					array(
						'Year'=> '2018',
						'Article'=> 'MVC патерн2',
						'discription'=>'Описание2'

						)
				);
		}
	}
 ?>