<?php
	function myPrint_r($variable, $action ="print"){ //si pas d'action = print
			echo "<pre>";
			switch($action):
				case "print" : print_r($variable);
				break;
				
				case "dump" :
				default:
					var_dump($variable);
			endswitch;
			echo "</pre>";
	};//générer balise pre

	function dateAff($date,$separator) {
		$date = explode('-',$date);// casse une chaine de caractère en un array
		$date = array_reverse($date);// inverse 
		$date = implode($separator, $date);// 
		return $date;
	}
?>