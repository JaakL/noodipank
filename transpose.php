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

	$stepsTest = '4';
	$filelocationTest = 'TulbidJaBonsai_NP.xml';
	$savingLocationTest = 'iksemmell/fourUp.xml';
	
	function transpose($steps, $filelocation, $savingLocation){
				
		
		if($steps == "6"){
			SixUp($filelocation, $savingLocation);
		}
		else if($steps == "5"){
			FiveUp($filelocation, $savingLocation);
		}	
		else if($steps == "4"){
			FourUp($filelocation, $savingLocation);
		}		
		else if($steps == "3"){
			ThreeUp($filelocation, $savingLocation);
		}		
		else if($steps == "2"){
			TwoUp($filelocation, $savingLocation);
		}		
		else if($steps == "1"){
			OneUp($filelocation, $savingLocation);
		}		
		else if($steps == "-1"){
			OneDown($filelocation, $savingLocation);
		}		
		else if($steps == "-2"){
			TwoDown($filelocation, $savingLocation);
		}		
		else if($steps == "-3"){
			ThreeDown($filelocation, $savingLocation);
		}		
		else if($steps == "-4"){
			FourDown($filelocation, $savingLocation);
		}
		else if($steps == "-5"){
			FiveDown($filelocation, $savingLocation);
		}
		else if($steps == "-6"){
			SixDown($filelocation, $savingLocation);
		}
		else if($steps == "0"){
			Zero($filelocation, $savingLocation);
		}
	
	}	
	$newXML = transpose($stepsTest, $filelocationTest, $savingLocationTest);
?>
