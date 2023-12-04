<?php 
class Resources {

	public static function Url($link, $print = true){
		if($print == true){
			echo APP_ROOT . $link;
		}else{
			return APP_ROOT . $link;
		}

	}
}
?>