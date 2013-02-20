<?php

  
	
	$steps = '-3';// Kuidas seda teada saab?
		
	
	if($steps == "6"){
		include_once('SixUp.php');
	}
	else if($steps == "5"){
		include_once('FiveUp.php');
	}	
	else if($steps == "4"){
		include_once('FourUp.php');
	}		
	else if($steps == "3"){
		include_once('ThreeUp.php');
	}		
	else if($steps == "2"){
		include_once('TwoUp.php');
	}		
	else if($steps == "1"){
		include_once('OneUp.php');	
	}		
	else if($steps == "-1"){
		include_once('OneDown.php');
	}		
	else if($steps == "-2"){
		include_once('TwoDown.php');
	}		
	else if($steps == "-3"){
		include_once('ThreeDown.php');
	}		
	else if($steps == "-4"){
		include_once('FourDown.php');
	}
	else if($steps == "-5"){
		include_once('FiveDown.php');
	}
	else if($steps == "-6"){
		include_once('SixDown.php');
	}

?>
