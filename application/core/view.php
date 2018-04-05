<?php 

/**
* view
*/
class View
{
	//public $template_view; //Можно указать общий вид по умолчанию.
	
	function generate($content_view, $template_view, $data = null)
	{
		/*
			if(is_array($data)){
				extract($data); преобразует элементы массива в переменные
			}
		*/

			include 'application/views/'.$template_view;
	}
}