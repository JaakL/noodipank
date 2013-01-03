<?php
   function transposeOneAndHalfUp()
   {
       $dom = new DOMDocument();
       $dom->load('TulbidJaBonsai_NP.xml');   				// 	See koht tuleb ära muuta nii, et võtaks Laikre poolt üles laetud ja kliendi poolt valitud laulu XML'i. Hetkel lihtsalt testimiseks üks fail.
       $count = $dom->getElementsByTagName('note')->length;
       $noot = $dom->documentElement;
       $xpath = new DOMXPath($dom);
       $notes = $xpath->query('//note/pitch');
       foreach($notes as $note){
       		/*Noodi muutmise osa*/
       	 	$steps = $note->getElementsByTagName('step');
       	 	$alter = $note->getElementsByTagName('alter');	
       	 	$octave = $note->getElementsByTagName('octave');
   
     	 	if($steps->item(0)->nodeValue == 'C' && $alter->item(0)){
		       if($steps->item(0)->nodeValue == 'C' && $alter->item(0)->nodeValue =='1'){
		       		$steps->item(0)->nodeValue = 'E';
		       		$alter->item(0)->nodeValue = '';
		       }
		       else if($steps->item(0)->nodeValue == 'C' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'D';
		       		$alter->item(0)->nodeValue = '';
		       }
		    }
	       else if($steps->item(0)->nodeValue == 'C' && !($alter->item(0))){
	       		$steps->item(0)->nodeValue = 'E';
	       	
	       		$child = $dom->createElement("alter");
	       		$note->appendChild($child);
	       		$alter = $note->getElementsByTagName('alter');
	       		$alter->item(0)->nodeValue = '-1';
	       
	       
	       }
	       else if($steps->item(0)->nodeValue == 'D' && $alter->item(0)){	       
		       if($steps->item(0)->nodeValue == 'D' && $alter->item(0)->nodeValue == '1'){
		       		$steps->item(0)->nodeValue = 'F';
		       		$alter->item(0)->nodeValue = '1';
		       }
		       else if($steps->item(0)->nodeValue == 'D' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'E';
		       		$alter->item(0)->nodeValue = '';
		       }
		    }
	       else if($steps->item(0)->nodeValue == 'D' && !($alter->item(0))){
	       		$steps->item(0)->nodeValue = 'F';
	       		
	       		$child = $dom->createElement("alter");
	       		$note->appendChild($child);
	       		$alter = $note->getElementsByTagName('alter');
	       		$alter->item(0)->nodeValue = '';
	       }
       	 	else if($steps->item(0)->nodeValue == 'E' && $alter->item(0)){
		       if($steps->item(0)->nodeValue == 'E' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'F';
		       		$alter->item(0)->nodeValue = '1';
		       }
		       else if($steps->item(0)->nodeValue == 'E' && $alter->item(0)->nodeValue == '1'){
		       		$steps->item(0)->nodeValue = 'G';
		       		$alter->item(0)->nodeValue = '1';
		       }
		    }
	       else if($steps->item(0)->nodeValue == 'E' && !($alter->item(0))){
	       		$steps->item(0)->nodeValue = 'G';
	       		
	       		$child = $dom->createElement("alter");
	       		$note->appendChild($child);
	       		$alter = $note->getElementsByTagName('alter');
	       		$alter->item(0)->nodeValue = '';
	       }
       	 	else if($steps->item(0)->nodeValue == 'F' && $alter->item(0)){
		       if($steps->item(0)->nodeValue == 'F' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'G';
		       		$alter->item(0)->nodeValue = '';
		       }
		       else if($steps->item(0)->nodeValue == 'F' && $alter->item(0)->nodeValue == '1'){
		       		$steps->item(0)->nodeValue = 'A';
		       		$alter->item(0)->nodeValue = '';
		       }
		    }
	       else if($steps->item(0)->nodeValue == 'F' && !($alter->item(0))){
	       		$steps->item(0)->nodeValue = 'A';
	       		
	       		$child = $dom->createElement("alter");
	       		$note->appendChild($child);
	       		$alter = $note->getElementsByTagName('alter');
	       		$alter->item(0)->nodeValue = '-1';
	       }
       	 	else if($steps->item(0)->nodeValue == 'G' && $alter->item(0)){	       
		       if($steps->item(0)->nodeValue == 'G' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'A';
		       		$alter->item(0)->nodeValue = '';
		       }
		       else if($steps->item(0)->nodeValue == 'G' && $alter->item(0)->nodeValue == '1'){
		       		$steps->item(0)->nodeValue = 'B';
		       		$alter->item(0)->nodeValue = '';
		       }
		    }
	       else if($steps->item(0)->nodeValue == 'G' && !($alter->item(0))){
	       		$steps->item(0)->nodeValue = 'B';
	       		
	       		$child = $dom->createElement("alter");
	       		$note->appendChild($child);
	       		$alter = $note->getElementsByTagName('alter');
	       		$alter->item(0)->nodeValue = '-1';
	       }
       	 	else if($steps->item(0)->nodeValue == 'A' && $alter->item(0)){
		       if($steps->item(0)->nodeValue == 'A' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'B';
		       		$alter->item(0)->nodeValue = '';
		       }
		       else if($steps->item(0)->nodeValue == 'A' && $alter->item(0)->nodeValue == '1'){
		       		$steps->item(0)->nodeValue = 'C';
		       		$alter->item(0)->nodeValue = '1';
		       		if($octave->item(0)->nodeValue == '1'){
			       		$octave->item(0)->nodeValue = '2';
		       		}
		       		else if($octave->item(0)->nodeValue == '2'){
			       		$octave->item(0)->nodeValue = '3';
		       		}
		       		else if($octave->item(0)->nodeValue == '3'){
			       		$octave->item(0)->nodeValue = '4';
		       		}
		       		else if($octave->item(0)->nodeValue == '4'){
			       		$octave->item(0)->nodeValue = '5';
		       		}
		       		else if($octave->item(0)->nodeValue == '5'){
			       		$octave->item(0)->nodeValue = '6';
		       		}
		       		else if($octave->item(0)->nodeValue == '6'){
			       		$octave->item(0)->nodeValue = '7';
		       		}
		       }
		    }
	       else if($steps->item(0)->nodeValue == 'A' && !($alter->item(0))){
	       		$steps->item(0)->nodeValue = 'C';
	       		
	       		$child = $dom->createElement("alter");
	       		$note->appendChild($child);
	       		$alter = $note->getElementsByTagName('alter');
	       		$alter->item(0)->nodeValue = '';
	       		if($octave->item(0)->nodeValue == '1'){
			       		$octave->item(0)->nodeValue = '2';
		       		}
		       		else if($octave->item(0)->nodeValue == '2'){
			       		$octave->item(0)->nodeValue = '3';
		       		}
		       		else if($octave->item(0)->nodeValue == '3'){
			       		$octave->item(0)->nodeValue = '4';
		       		}
		       		else if($octave->item(0)->nodeValue == '4'){
			       		$octave->item(0)->nodeValue = '5';
		       		}
		       		else if($octave->item(0)->nodeValue == '5'){
			       		$octave->item(0)->nodeValue = '6';
		       		}
		       		else if($octave->item(0)->nodeValue == '6'){
			       		$octave->item(0)->nodeValue = '7';
		       		}
	       }
       	 	else if($steps->item(0)->nodeValue == 'B' &&  $alter->item(0)){	       
		       if($steps->item(0)->nodeValue == 'B' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'D';
		       		$alter->item(0)->nodeValue = '-1';
		       		if($octave->item(0)->nodeValue == '1'){
			       		$octave->item(0)->nodeValue = '2';
		       		}
		       		else if($octave->item(0)->nodeValue == '2'){
			       		$octave->item(0)->nodeValue = '3';
		       		}
		       		else if($octave->item(0)->nodeValue == '3'){
			       		$octave->item(0)->nodeValue = '4';
		       		}
		       		else if($octave->item(0)->nodeValue == '4'){
			       		$octave->item(0)->nodeValue = '5';
		       		}
		       		else if($octave->item(0)->nodeValue == '5'){
			       		$octave->item(0)->nodeValue = '6';
		       		}
		       		else if($octave->item(0)->nodeValue == '6'){
			       		$octave->item(0)->nodeValue = '7';
		       		}
		       }
		       else if($steps->item(0)->nodeValue == 'B' && $alter->item(0)->nodeValue == '1'){
		       		$steps->item(0)->nodeValue = 'D';
		       		$alter->item(0)->nodeValue = '1';
		       		if($octave->item(0)->nodeValue == '1'){
			       		$octave->item(0)->nodeValue = '2';
		       		}
		       		else if($octave->item(0)->nodeValue == '2'){
			       		$octave->item(0)->nodeValue = '3';
		       		}
		       		else if($octave->item(0)->nodeValue == '3'){
			       		$octave->item(0)->nodeValue = '4';
		       		}
		       		else if($octave->item(0)->nodeValue == '4'){
			       		$octave->item(0)->nodeValue = '5';
		       		}
		       		else if($octave->item(0)->nodeValue == '5'){
			       		$octave->item(0)->nodeValue = '6';
		       		}
		       		else if($octave->item(0)->nodeValue == '6'){
			       		$octave->item(0)->nodeValue = '7';
		       		}
		       }
		    }
	       else if($steps->item(0)->nodeValue == 'B' && !($alter->item(0))){
	       		$steps->item(0)->nodeValue = 'D';
	       		
	       		$child = $dom->createElement("alter");
	       		$note->appendChild($child);
	       		$alter = $note->getElementsByTagName('alter');
	       		$alter->item(0)->nodeValue = '';
	       		if($octave->item(0)->nodeValue == '1'){
		       		$octave->item(0)->nodeValue = '2';
	       		}
	       		else if($octave->item(0)->nodeValue == '2'){
		       		$octave->item(0)->nodeValue = '3';
	       		}
	       		else if($octave->item(0)->nodeValue == '3'){
		       		$octave->item(0)->nodeValue = '4';
	       		}
	       		else if($octave->item(0)->nodeValue == '4'){
		       		$octave->item(0)->nodeValue = '5';
	       		}
	       		else if($octave->item(0)->nodeValue == '5'){
		       		$octave->item(0)->nodeValue = '6';
	       		}
	       		else if($octave->item(0)->nodeValue == '6'){
		       		$octave->item(0)->nodeValue = '7';
	       		}
	       }
	   }
     
       header("Content-type: text/xml");
       echo $dom->saveXML();
       
       
   }   
   $proov = transposeOneAndHalfUp();
   
?>
