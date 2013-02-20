<?php

	include_once('SixDown.php');
	include_once('SixUp.php');
	include_once('FiveDown.php');
	include_once('FiveUp.php');
	include_once('FourDown.php');
	include_once('FourUp.php');
	include_once('ThreeDown.php');
	include_once('ThreeUp.php');
	include_once('TwoDown.php');
	include_once('TwoUp.php');
	include_once('OneDown.php');
	include_once('OneUp.php');
	include_once('Zero.php');


function transpose($steps, $location){
			
	
	if($steps == "6"){
		SixUp($location);
	}
	else if($steps == "5"){
		FiveUp($location);
	}	
	else if($steps == "4"){
		FourUp($location);
	}		
	else if($steps == "3"){
		ThreeUp($location);
	}		
	else if($steps == "2"){
		TwoUp($location);
	}		
	else if($steps == "1"){
		OneUp($location);
	}		
	else if($steps == "-1"){
		OneDown($location);
	}		
	else if($steps == "-2"){
		TwoDown($location);
	}		
	else if($steps == "-3"){
		ThreeDown($location);
	}		
	else if($steps == "-4"){
		FourDown($location);
	}
	else if($steps == "-5"){
		FiveDown($location);
	}
	else if($steps == "-6"){
		SixDown($location);
	}
	else if($steps == "0"){
		Zero($location);
	}

}
?>
