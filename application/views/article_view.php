<h1>Тут статьи</h1>
<?php 
	foreach ($data as $value) {
		echo $value['title'];
		echo $value['content'];		
	}
 ?>