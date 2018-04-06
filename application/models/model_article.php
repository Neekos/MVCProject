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
	/**
	d($article);
			die;
	*/
	public function get_article(){
			$db = DB::connect();
			$article = array();
			$result = $db->query('SELECT * From posts');
			$i=0;
			while($row=$result->fetch()){
				$article[$i]['id_post']=$row['title'];
				$i++;
			}
			
			return $article;
		}
	
	
		
	}
 ?>