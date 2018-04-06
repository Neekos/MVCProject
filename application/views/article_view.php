<h1>Тут статьи</h1>
<?php 
	foreach ($data as $value) {
		echo $value['id_post'].'<hr>';	
		echo $value['title'];
	}
 ?>