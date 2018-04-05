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
	
	public function get_article(){
			$db = Database::connect();
			$article = array();
			$result = $db->query('SELECT * From posts');
			$i=0;
			while($row=$result->fetch()){
				$article[$i]['id_post']=$row['id_post'];
				$i++;
			}
			return $article;
		}
	
	
		
	}
 ?>