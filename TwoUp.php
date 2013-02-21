<?php
   function TwoUp($filelocation, $savingLocation)
   {
       $dom = new DOMDocument('1.0');
       $dom->load($filelocation); 					// 	See koht tuleb ära muuta nii, et võtaks Laikre poolt üles laetud ja kliendi poolt valitud laulu XML'i. Hetkel lihtsalt testimiseks üks fail.
       $xpath = new DOMXPath($dom);
      
       $count = $dom->getElementsByTagName('measure')->length;
       $count = round($count/4);
       $measures = $xpath->query('//measure');
		 
       for ($i = $count; $i < $measures->length; $i++) {
		    $temp = $measures->item($i); //avoid calling a function twice
		    $temp->parentNode->removeChild($temp);
		}
     
     
     
      /*KEY CHANGING PART*/
      $result = $xpath->query('/score-partwise/part/measure/attributes/key/fifths'); // Get the node which declares the fifths for a key

       /*Changing the fifths, thus changing the key*/

       if($result->item(0)->nodeValue == '-6'){
       		$result->item(0)->nodeValue = '-2';
       }else if($result->item(0)->nodeValue == '1'){
       		$result->item(0)->nodeValue = '5';
       }
       else if($result->item(0)->nodeValue == '-4'){
       		$result->item(0)->nodeValue = '0';
       }
       else if($result->item(0)->nodeValue == '3'){
       		$result->item(0)->nodeValue = '-5';
       }
       else if($result->item(0)->nodeValue == '-2'){
       		$result->item(0)->nodeValue = '2';
       }
       else if($result->item(0)->nodeValue == '5'){
       		$result->item(0)->nodeValue = '-3';
       }
       else if($result->item(0)->nodeValue == '0'){
       		$result->item(0)->nodeValue = '4';
       }
       else if($result->item(0)->nodeValue == '-5'){
       		$result->item(0)->nodeValue = '-1';
       }
       else if($result->item(0)->nodeValue == '2'){
       		$result->item(0)->nodeValue = '6';
       }
       else if($result->item(0)->nodeValue == '-3'){
       		$result->item(0)->nodeValue = '1';
       }
       else if($result->item(0)->nodeValue == '4'){
       		$result->item(0)->nodeValue = '-4';
       }
       else if($result->item(0)->nodeValue == '-1'){
       		$result->item(0)->nodeValue = '3';
       }
       //END OF KEY CHANGING
      
      
      /*GET THE NODE NEEDED TO TRANSPORT NOTES*/
      $notes = $xpath->query('//note/pitch');
       
       /*TRANSPOSING NOTES*/
       foreach($notes as $note){

       	 	$steps = $note->getElementsByTagName('step');
       	 	$alter = $note->getElementsByTagName('alter');	
       	 	$octave = $note->getElementsByTagName('octave');
   
     	 	if($steps->item(0)->nodeValue == 'C' && $alter->item(0)){
		       if($steps->item(0)->nodeValue == 'C' && $alter->item(0)->nodeValue =='1'){
		       		$steps->item(0)->nodeValue = 'F';
		       		$alter->item(0)->nodeValue = '0';
		       }
		       else if($steps->item(0)->nodeValue == 'C' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'D';
		       		$alter->item(0)->nodeValue = '1';
		       }
		    }
	       else if($steps->item(0)->nodeValue == 'C' && !($alter->item(0))){
	       		$steps->item(0)->nodeValue = 'E';
	       	
	       		$child = $dom->createElement("alter");
	       		$note->appendChild($child);
	       		$alter = $note->getElementsByTagName('alter');
	       		$alter->item(0)->nodeValue = '0';
	       
	       
	       }
	       else if($steps->item(0)->nodeValue == 'D' && $alter->item(0)){	       
		       if($steps->item(0)->nodeValue == 'D' && $alter->item(0)->nodeValue == '1'){
		       		$steps->item(0)->nodeValue = 'G';
		       		$alter->item(0)->nodeValue = '0';
		       }
		       else if($steps->item(0)->nodeValue == 'D' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'F';
		       		$alter->item(0)->nodeValue = '0';
		       }
		    }
	       else if($steps->item(0)->nodeValue == 'D' && !($alter->item(0))){
	       		$steps->item(0)->nodeValue = 'F';
	       		
	       		$child = $dom->createElement("alter");
	       		$note->appendChild($child);
	       		$alter = $note->getElementsByTagName('alter');
	       		$alter->item(0)->nodeValue = '1';
	       }
       	 	else if($steps->item(0)->nodeValue == 'E' && $alter->item(0)){
		       if($steps->item(0)->nodeValue == 'E' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'G';
		       		$alter->item(0)->nodeValue = '0';
		       }
		       else if($steps->item(0)->nodeValue == 'E' && $alter->item(0)->nodeValue == '1'){
		       		$steps->item(0)->nodeValue = 'A';
		       		$alter->item(0)->nodeValue = '0';
		       }
		    }
	       else if($steps->item(0)->nodeValue == 'E' && !($alter->item(0))){
	       		$steps->item(0)->nodeValue = 'G';
	       		
	       		$child = $dom->createElement("alter");
	       		$note->appendChild($child);
	       		$alter = $note->getElementsByTagName('alter');
	       		$alter->item(0)->nodeValue = '1';
	       }
       	 	else if($steps->item(0)->nodeValue == 'F' && $alter->item(0)){
		       if($steps->item(0)->nodeValue == 'F' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'G';
		       		$alter->item(0)->nodeValue = '1';
		       }
		       else if($steps->item(0)->nodeValue == 'F' && $alter->item(0)->nodeValue == '1'){
		       		$steps->item(0)->nodeValue = 'A';
		       		$alter->item(0)->nodeValue = '1';
		       }
		    }
	       else if($steps->item(0)->nodeValue == 'F' && !($alter->item(0))){
	       		$steps->item(0)->nodeValue = 'A';
	       		
	       		$child = $dom->createElement("alter");
	       		$note->appendChild($child);
	       		$alter = $note->getElementsByTagName('alter');
	       		$alter->item(0)->nodeValue = '0';
	       }
       	 	else if($steps->item(0)->nodeValue == 'G' && $alter->item(0)){	       
		       if($steps->item(0)->nodeValue == 'G' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'A';
		       		$alter->item(0)->nodeValue = '1';
		       }
		       else if($steps->item(0)->nodeValue == 'G' && $alter->item(0)->nodeValue == '1'){
		       		$steps->item(0)->nodeValue = 'C';
		       		$alter->item(0)->nodeValue = '0';
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
	       else if($steps->item(0)->nodeValue == 'G' && !($alter->item(0))){
	       		$steps->item(0)->nodeValue = 'B';
	       		
	       		$child = $dom->createElement("alter");
	       		$note->appendChild($child);
	       		$alter = $note->getElementsByTagName('alter');
	       		$alter->item(0)->nodeValue = '0';
	       }
       	 	else if($steps->item(0)->nodeValue == 'A' && $alter->item(0)){
		       if($steps->item(0)->nodeValue == 'A' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'C';
		       		$alter->item(0)->nodeValue = '0';
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
		       else if($steps->item(0)->nodeValue == 'A' && $alter->item(0)->nodeValue == '1'){
		       		$steps->item(0)->nodeValue = 'D';
		       		$alter->item(0)->nodeValue = '0';
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
       	 	else if($steps->item(0)->nodeValue == 'B' &&  $alter->item(0)){	       
		       if($steps->item(0)->nodeValue == 'B' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'D';
		       		$alter->item(0)->nodeValue = '0';
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
		       		$steps->item(0)->nodeValue = 'E';
		       		$alter->item(0)->nodeValue = '0';
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
	   } //END OF TRANSPOSING NOTES
	   
       
       /*DELETING HARMONY TAGS*/   
       $harmonies = $xpath->query('//harmony');
       
       for ($i = 0; $i < $harmonies->length; $i++) {
		    $temp = $harmonies->item($i);
		    $temp->parentNode->removeChild($temp);
		}
       $dom->save($savingLocation);
   }    
?>
