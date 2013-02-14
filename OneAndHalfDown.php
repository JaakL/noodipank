<?php
   function OneAndHalfDown()
   {
       $dom = new DOMDocument();
       $dom->load('TulbidJaBonsai_NP.xml'); 					// 	See koht tuleb ära muuta nii, et võtaks Laikre poolt üles laetud ja kliendi poolt valitud laulu XML'i. Hetkel lihtsalt testimiseks üks fail.
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
       		$result->item(0)->nodeValue = '-3';
       }else if($result->item(0)->nodeValue == '1'){
       		$result->item(0)->nodeValue = '4';
       }
       else if($result->item(0)->nodeValue == '-4'){
       		$result->item(0)->nodeValue = '-1';
       }
       else if($result->item(0)->nodeValue == '3'){
       		$result->item(0)->nodeValue = '6';
       }
       else if($result->item(0)->nodeValue == '-2'){
       		$result->item(0)->nodeValue = '1';
       }
       else if($result->item(0)->nodeValue == '5'){
       		$result->item(0)->nodeValue = '-4';
       }
       else if($result->item(0)->nodeValue == '0'){
       		$result->item(0)->nodeValue = '3';
       }
       else if($result->item(0)->nodeValue == '-5'){
       		$result->item(0)->nodeValue = '-2';
       }
       else if($result->item(0)->nodeValue == '2'){
       		$result->item(0)->nodeValue = '5';
       }
       else if($result->item(0)->nodeValue == '-3'){
       		$result->item(0)->nodeValue = '0';
       }
       else if($result->item(0)->nodeValue == '4'){
       		$result->item(0)->nodeValue = '-5';
       }
       else if($result->item(0)->nodeValue == '-1'){
       		$result->item(0)->nodeValue = '2';
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
		       		$steps->item(0)->nodeValue = 'B';
		       		$alter->item(0)->nodeValue = '-1';
		       		if($octave->item(0)->nodeValue == '2'){
			       		$octave->item(0)->nodeValue = '1';
		       		}
		       		else if($octave->item(0)->nodeValue == '3'){
			       		$octave->item(0)->nodeValue = '2';
		       		}
		       		else if($octave->item(0)->nodeValue == '4'){
			       		$octave->item(0)->nodeValue = '3';
		       		}
		       		else if($octave->item(0)->nodeValue == '5'){
			       		$octave->item(0)->nodeValue = '4';
		       		}
		       		else if($octave->item(0)->nodeValue == '6'){
			       		$octave->item(0)->nodeValue = '5';
		       		}
		       		else if($octave->item(0)->nodeValue == '7'){
			       		$octave->item(0)->nodeValue = '6';
		       		}
		       }
		       else if($steps->item(0)->nodeValue == 'C' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'A';
		       		$alter->item(0)->nodeValue = '-1';
		       		if($octave->item(0)->nodeValue == '2'){
			       		$octave->item(0)->nodeValue = '1';
		       		}
		       		else if($octave->item(0)->nodeValue == '3'){
			       		$octave->item(0)->nodeValue = '2';
		       		}
		       		else if($octave->item(0)->nodeValue == '4'){
			       		$octave->item(0)->nodeValue = '3';
		       		}
		       		else if($octave->item(0)->nodeValue == '5'){
			       		$octave->item(0)->nodeValue = '4';
		       		}
		       		else if($octave->item(0)->nodeValue == '6'){
			       		$octave->item(0)->nodeValue = '5';
		       		}
		       		else if($octave->item(0)->nodeValue == '7'){
			       		$octave->item(0)->nodeValue = '6';
		       		}
		       	}
		       
		    }
	       else if($steps->item(0)->nodeValue == 'C' && !($alter->item(0))){
	       		$steps->item(0)->nodeValue = 'A';
	       	
	       		$child = $dom->createElement("alter");
	       		$note->appendChild($child);
	       		$alter = $note->getElementsByTagName('alter');
	       		$alter->item(0)->nodeValue = '';
	       		if($octave->item(0)->nodeValue == '2'){
		       		$octave->item(0)->nodeValue = '1';
	       		}
	       		else if($octave->item(0)->nodeValue == '3'){
		       		$octave->item(0)->nodeValue = '2';
	       		}
	       		else if($octave->item(0)->nodeValue == '4'){
		       		$octave->item(0)->nodeValue = '3';
	       		}
	       		else if($octave->item(0)->nodeValue == '5'){
		       		$octave->item(0)->nodeValue = '4';
	       		}
	       		else if($octave->item(0)->nodeValue == '6'){
		       		$octave->item(0)->nodeValue = '5';
	       		}
	       		else if($octave->item(0)->nodeValue == '7'){
		       		$octave->item(0)->nodeValue = '6';
	       		}

	       
	       
	       }
	       else if($steps->item(0)->nodeValue == 'D' && $alter->item(0)){	       
		       if($steps->item(0)->nodeValue == 'D' && $alter->item(0)->nodeValue == '1'){
		       		$steps->item(0)->nodeValue = 'C';
		       		$alter->item(0)->nodeValue = '';
		       }
		       else if($steps->item(0)->nodeValue == 'D' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'B';
		       		$alter->item(0)->nodeValue = '-1';
		       		if($octave->item(0)->nodeValue == '2'){
			       		$octave->item(0)->nodeValue = '1';
		       		}
		       		else if($octave->item(0)->nodeValue == '3'){
			       		$octave->item(0)->nodeValue = '2';
		       		}
		       		else if($octave->item(0)->nodeValue == '4'){
			       		$octave->item(0)->nodeValue = '3';
		       		}
		       		else if($octave->item(0)->nodeValue == '5'){
			       		$octave->item(0)->nodeValue = '4';
		       		}
		       		else if($octave->item(0)->nodeValue == '6'){
			       		$octave->item(0)->nodeValue = '5';
		       		}
		       		else if($octave->item(0)->nodeValue == '7'){
			       		$octave->item(0)->nodeValue = '6';
		       		}
		       }
		    }
	       else if($steps->item(0)->nodeValue == 'D' && !($alter->item(0))){
	       		$steps->item(0)->nodeValue = 'B';
	       		
	       		$child = $dom->createElement("alter");
	       		$note->appendChild($child);
	       		$alter = $note->getElementsByTagName('alter');
	       		$alter->item(0)->nodeValue = '';
	       		if($octave->item(0)->nodeValue == '2'){
		       		$octave->item(0)->nodeValue = '1';
	       		}
	       		else if($octave->item(0)->nodeValue == '3'){
		       		$octave->item(0)->nodeValue = '2';
	       		}
	       		else if($octave->item(0)->nodeValue == '4'){
		       		$octave->item(0)->nodeValue = '3';
	       		}
	       		else if($octave->item(0)->nodeValue == '5'){
		       		$octave->item(0)->nodeValue = '4';
	       		}
	       		else if($octave->item(0)->nodeValue == '6'){
		       		$octave->item(0)->nodeValue = '5';
	       		}
	       		else if($octave->item(0)->nodeValue == '7'){
		       		$octave->item(0)->nodeValue = '6';
	       		}

	       }
       	 	else if($steps->item(0)->nodeValue == 'E' && $alter->item(0)){
		       if($steps->item(0)->nodeValue == 'E' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'C';
		       		$alter->item(0)->nodeValue = '';
		       }
		       else if($steps->item(0)->nodeValue == 'E' && $alter->item(0)->nodeValue == '1'){
		       		$steps->item(0)->nodeValue = 'D';
		       		$alter->item(0)->nodeValue = '';
		       }
		    }
	       else if($steps->item(0)->nodeValue == 'E' && !($alter->item(0))){
	       		$steps->item(0)->nodeValue = 'C';
	       		
	       		$child = $dom->createElement("alter");
	       		$note->appendChild($child);
	       		$alter = $note->getElementsByTagName('alter');
	       		$alter->item(0)->nodeValue = '1';
	       }
       	 	else if($steps->item(0)->nodeValue == 'F' && $alter->item(0)){
		       if($steps->item(0)->nodeValue == 'F' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'D';
		       		$alter->item(0)->nodeValue = '-1';
		       }
		       else if($steps->item(0)->nodeValue == 'F' && $alter->item(0)->nodeValue == '1'){
		       		$steps->item(0)->nodeValue = 'E';
		       		$alter->item(0)->nodeValue = '-1';
		       }
		    }
	       else if($steps->item(0)->nodeValue == 'F' && !($alter->item(0))){
	       		$steps->item(0)->nodeValue = 'D';
	       		
	       		$child = $dom->createElement("alter");
	       		$note->appendChild($child);
	       		$alter = $note->getElementsByTagName('alter');
	       		$alter->item(0)->nodeValue = '';
	       }
       	 	else if($steps->item(0)->nodeValue == 'G' && $alter->item(0)){	       
		       if($steps->item(0)->nodeValue == 'G' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'E';
		       		$alter->item(0)->nodeValue = '-1';
		       }
		       else if($steps->item(0)->nodeValue == 'G' && $alter->item(0)->nodeValue == '1'){
		       		$steps->item(0)->nodeValue = 'F';
		       		$alter->item(0)->nodeValue = '';
		       }
		    }
	       else if($steps->item(0)->nodeValue == 'G' && !($alter->item(0))){
	       		$steps->item(0)->nodeValue = 'E';
	       		
	       		$child = $dom->createElement("alter");
	       		$note->appendChild($child);
	       		$alter = $note->getElementsByTagName('alter');
	       		$alter->item(0)->nodeValue = '';
	       }
       	 	else if($steps->item(0)->nodeValue == 'A' && $alter->item(0)){
		       if($steps->item(0)->nodeValue == 'A' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'F';
		       		$alter->item(0)->nodeValue = '';
		       }
		       else if($steps->item(0)->nodeValue == 'A' && $alter->item(0)->nodeValue == '1'){
		       		$steps->item(0)->nodeValue = 'G';
		       		$alter->item(0)->nodeValue = '';
		       }
		    }
	       else if($steps->item(0)->nodeValue == 'A' && !($alter->item(0))){
	       		$steps->item(0)->nodeValue = 'F';
	       		
	       		$child = $dom->createElement("alter");
	       		$note->appendChild($child);
	       		$alter = $note->getElementsByTagName('alter');
	       		$alter->item(0)->nodeValue = '1';
	       }
       	 	else if($steps->item(0)->nodeValue == 'B' &&  $alter->item(0)){	       
		       if($steps->item(0)->nodeValue == 'B' && $alter->item(0)->nodeValue == '-1'){
		       		$steps->item(0)->nodeValue = 'G';
		       		$alter->item(0)->nodeValue = '';
		       }
		       else if($steps->item(0)->nodeValue == 'B' && $alter->item(0)->nodeValue == '1'){
		       		$steps->item(0)->nodeValue = 'A';
		       		$alter->item(0)->nodeValue = '';
		       		
		       }
		    }
	       else if($steps->item(0)->nodeValue == 'B' && !($alter->item(0))){
	       		$steps->item(0)->nodeValue = 'G';
	       		
	       		$child = $dom->createElement("alter");
	       		$note->appendChild($child);
	       		$alter = $note->getElementsByTagName('alter');
	       		$alter->item(0)->nodeValue = '1';
	       		
	       }
	   } //END OF TRANSPOSING NOTES
	   
       
       /*TRANSPOSING HARMONY*/   
       $roots = $xpath->query('//root');
       foreach($roots as $root){
       	 	
       	 	$root_steps = $root->getElementsByTagName('root-step');
       	 	$root_alter = $root->getElementsByTagName('root-alter');
   
     	 	if($root_steps->item(0)->nodeValue == 'C' && $root_alter->item(0)){
		       if($root_steps->item(0)->nodeValue == 'C' && $root_alter->item(0)->nodeValue =='1'){
		       		$root_steps->item(0)->nodeValue = 'B';
		       		$root_alter->item(0)->nodeValue = '-1';
		       }
		       else if($root_steps->item(0)->nodeValue == 'C' && $root_alter->item(0)->nodeValue == '-1'){
		       		$root_steps->item(0)->nodeValue = 'A';
		       		$root_alter->item(0)->nodeValue = '-1';
		       }
		    }
	       else if($root_steps->item(0)->nodeValue == 'C' && !($root_alter->item(0))){
	       		$root_steps->item(0)->nodeValue = 'A';
	       	
	       		$child = $dom->createElement("root-alter");
	       		$root->appendChild($child);
	       		$root_alter = $root->getElementsByTagName('root-alter');
	       		$root_alter->item(0)->nodeValue = '';
	       
	       
	       }
	       else if($root_steps->item(0)->nodeValue == 'D' && $root_alter->item(0)){	       
		       if($root_steps->item(0)->nodeValue == 'D' && $root_alter->item(0)->nodeValue == '1'){
		       		$root_steps->item(0)->nodeValue = 'C';
		       		$root_alter->item(0)->nodeValue = '';
		       }
		       else if($root_steps->item(0)->nodeValue == 'D' && $root_alter->item(0)->nodeValue == '-1'){
		       		$root_steps->item(0)->nodeValue = 'B';
		       		$root_alter->item(0)->nodeValue = '-1';
		       }
		    }
	       else if($root_steps->item(0)->nodeValue == 'D' && !($root_alter->item(0))){
	       		$root_steps->item(0)->nodeValue = 'B';
	       		
	       		$child = $dom->createElement("root-alter");
	       		$root->appendChild($child);
	       		$root_alter = $root->getElementsByTagName('root-alter');
	       		$root_alter->item(0)->nodeValue = '';
	       }
       	 	else if($root_steps->item(0)->nodeValue == 'E' && $root_alter->item(0)){
		       if($root_steps->item(0)->nodeValue == 'E' && $root_alter->item(0)->nodeValue == '-1'){
		       		$root_steps->item(0)->nodeValue = 'C';
		       		$root_alter->item(0)->nodeValue = '';
		       }
		       else if($root_steps->item(0)->nodeValue == 'E' && $root_alter->item(0)->nodeValue == '1'){
		       		$root_steps->item(0)->nodeValue = 'D';
		       		$root_alter->item(0)->nodeValue = '';
		       }
		    }
	       else if($root_steps->item(0)->nodeValue == 'E' && !($root_alter->item(0))){
	       		$root_steps->item(0)->nodeValue = 'D';
	       		
	       		$child = $dom->createElement("root-alter");
	       		$root->appendChild($child);
	       		$root_alter = $root->getElementsByTagName('root-alter');
	       		$root_alter->item(0)->nodeValue = '-1';
	       }
       	 	else if($root_steps->item(0)->nodeValue == 'F' && $root_alter->item(0)){
		       if($root_steps->item(0)->nodeValue == 'F' && $root_alter->item(0)->nodeValue == '-1'){
		       		$root_steps->item(0)->nodeValue = 'D';
		       		$root_alter->item(0)->nodeValue = '-1';
		       }
		       else if($root_steps->item(0)->nodeValue == 'F' && $root_alter->item(0)->nodeValue == '1'){
		       		$root_steps->item(0)->nodeValue = 'E';
		       		$root_alter->item(0)->nodeValue = '-1';
		       }
		    }
	       else if($root_steps->item(0)->nodeValue == 'F' && !($root_alter->item(0))){
	       		$root_steps->item(0)->nodeValue = 'D';
	       		
	       		$child = $dom->createElement("root-alter");
	       		$root->appendChild($child);
	       		$root_alter = $root->getElementsByTagName('root-alter');
	       		$root_alter->item(0)->nodeValue = '';
	       }
       	 	else if($root_steps->item(0)->nodeValue == 'G' && $root_alter->item(0)){	       
		       if($root_steps->item(0)->nodeValue == 'G' && $root_alter->item(0)->nodeValue == '-1'){
		       		$root_steps->item(0)->nodeValue = 'E';
		       		$root_alter->item(0)->nodeValue = '-1';
		       }
		       else if($root_steps->item(0)->nodeValue == 'G' && $root_alter->item(0)->nodeValue == '1'){
		       		$root_steps->item(0)->nodeValue = 'F';
		       		$root_alter->item(0)->nodeValue = '';
		       }
		    }
	       else if($root_steps->item(0)->nodeValue == 'G' && !($root_alter->item(0))){
	       		$root_steps->item(0)->nodeValue = 'E';
	       		
	       		$child = $dom->createElement("root-alter");
	       		$root->appendChild($child);
	       		$root_alter = $root->getElementsByTagName('root-alter');
	       		$root_alter->item(0)->nodeValue = '';
	       }
       	 	else if($root_steps->item(0)->nodeValue == 'A' && $root_alter->item(0)){
		       if($root_steps->item(0)->nodeValue == 'A' && $root_alter->item(0)->nodeValue == '-1'){
		       		$root_steps->item(0)->nodeValue = 'F';
		       		$root_alter->item(0)->nodeValue = '';
		       }
		       else if($root_steps->item(0)->nodeValue == 'A' && $root_alter->item(0)->nodeValue == '1'){
		       		$root_steps->item(0)->nodeValue = 'G';
		       		$root_alter->item(0)->nodeValue = '';
		       }
		    }
	       else if($root_steps->item(0)->nodeValue == 'A' && !($root_alter->item(0))){
	       		$root_steps->item(0)->nodeValue = 'F';
	       		
	       		$child = $dom->createElement("root-alter");
	       		$root->appendChild($child);
	       		$root_alter = $root->getElementsByTagName('root-alter');
	       		$root_alter->item(0)->nodeValue = '1';
	       }
       	 	else if($root_steps->item(0)->nodeValue == 'B' &&  $root_alter->item(0)){	       
		       if($root_steps->item(0)->nodeValue == 'B' && $root_alter->item(0)->nodeValue == '-1'){
		       		$root_steps->item(0)->nodeValue = 'G';
		       		$root_alter->item(0)->nodeValue = '';
		       }
		       else if($root_steps->item(0)->nodeValue == 'B' && $root_alter->item(0)->nodeValue == '1'){
		       		$root_steps->item(0)->nodeValue = 'A';
		       		$root_alter->item(0)->nodeValue = '';
		       		
		       }
		    }
	       else if($root_steps->item(0)->nodeValue == 'B' && !($root_alter->item(0))){
	       		$root_steps->item(0)->nodeValue = 'A';
	       		
	       		$child = $dom->createElement("root-alter"); 
	       		$root->appendChild($child);
	       		$root_alter = $root->getElementsByTagName('root-alter');
	       		$root_alter->item(0)->nodeValue = '-1';
	       		
	       }
	       
	       
	   }// END OF TRANSPOSING HARMONY
	   
	   /*TRANSPOSING HARMONY BASS PART*/
	   
	   $basses = $xpath->query('//bass');
	   
	   foreach($basses as $bass){
	  
		   $bass_step = $bass->getElementsByTagName('bass-step');
		   $bass_alter = $bass->getElementsByTagName('bass-alter');
		   
		   if($bass_step->item(0)){
	       	
		       if($bass_step->item(0)->nodeValue == 'C' && $bass_alter->item(0)){
			       	if($bass_step->item(0)->nodeValue == 'C' && $bass_alter->item(0)->nodeValue == '1'){
				       	$bass_step->item(0)->nodeValue = 'B';
				       	$bass_alter->item(0)->nodeValue = '-1';
			       	}
			       	if($bass_step->item(0)->nodeValue == 'C' && $bass_alter->item(0)->nodeValue == '-1'){
				       	$bass_step->item(0)->nodeValue = 'A';
				       	$bass_alter->item(0)->nodeValue = '-1';
			       	}
			       
		       }
		       if($bass_step->item(0)->nodeValue == 'C' && !($bass_alter->item(0))){
			       $bass_step->item(0)->nodeValue = 'A';
			       
			       $child = $dom->createElement("bass-alter");
			       $bass->appendChild($child);
			       $bass_alter = $bass->getElementsByTagName('bass-alter');
			       $bass_alter->item(0)->nodeValue = '';
		       }
		       // END
		       
		       		       
		       if($bass_step->item(0)->nodeValue == 'D' && $bass_alter->item(0)){
			       	if($bass_step->item(0)->nodeValue == 'D' && $bass_alter->item(0)->nodeValue == '1'){
				       	$bass_step->item(0)->nodeValue = 'C';
				       	$bass_alter->item(0)->nodeValue = '';
			       	}
			       	if($bass_step->item(0)->nodeValue == 'D' && $bass_alter->item(0)->nodeValue == '-1'){
				       	$bass_step->item(0)->nodeValue = 'B';
				       	$bass_alter->item(0)->nodeValue = '-1';
			       	}
			       
		       }
		       if($bass_step->item(0)->nodeValue == 'D' && !($bass_alter->item(0))){
			       $bass_step->item(0)->nodeValue = 'B';
			       
			       $child = $dom->createElement("bass-alter");
			       $bass->appendChild($child);
			       $bass_alter = $bass->getElementsByTagName('bass-alter');
			       $bass_alter->item(0)->nodeValue = '';
		       }
		       // END		       
		       
		       if($bass_step->item(0)->nodeValue == 'E' && $bass_alter->item(0)){
			       	if($bass_step->item(0)->nodeValue == 'E' && $bass_alter->item(0)->nodeValue == '1'){
				       	$bass_step->item(0)->nodeValue = 'D';
				       	$bass_alter->item(0)->nodeValue = '';
			       	}
			       	if($bass_step->item(0)->nodeValue == 'E' && $bass_alter->item(0)->nodeValue == '-1'){
				       	$bass_step->item(0)->nodeValue = 'C';
				       	$bass_alter->item(0)->nodeValue = '';
			       	}
			       
		       }
		       if($bass_step->item(0)->nodeValue == 'E' && !($bass_alter->item(0))){
			       $bass_step->item(0)->nodeValue = 'D';
			       
			       $child = $dom->createElement("bass-alter");
			       $bass->appendChild($child);
			       $bass_alter = $bass->getElementsByTagName('bass-alter');
			       $bass_alter->item(0)->nodeValue = '-1';
		       }
		       // END
		       
		       		       
		       if($bass_step->item(0)->nodeValue == 'F' && $bass_alter->item(0)){
			       	if($bass_step->item(0)->nodeValue == 'F' && $bass_alter->item(0)->nodeValue == '1'){
				       	$bass_step->item(0)->nodeValue = 'E';
				       	$bass_alter->item(0)->nodeValue = '-1';
			       	}
			       	if($bass_step->item(0)->nodeValue == 'F' && $bass_alter->item(0)->nodeValue == '-1'){
				       	$bass_step->item(0)->nodeValue = 'D';
				       	$bass_alter->item(0)->nodeValue = '-1';
			       	}
			       
		       }
		       if($bass_step->item(0)->nodeValue == 'F' && !($bass_alter->item(0))){
			       $bass_step->item(0)->nodeValue = 'D';
			       
			       $child = $dom->createElement("bass-alter");
			       $bass->appendChild($child);
			       $bass_alter = $bass->getElementsByTagName('bass-alter');
			       $bass_alter->item(0)->nodeValue = '';
		       }
		       // END	
		       		       
		       if($bass_step->item(0)->nodeValue == 'G' && $bass_alter->item(0)){
			       	if($bass_step->item(0)->nodeValue == 'G' && $bass_alter->item(0)->nodeValue == '1'){
				       	$bass_step->item(0)->nodeValue = 'F';
				       	$bass_alter->item(0)->nodeValue = '';
			       	}
			       	if($bass_step->item(0)->nodeValue == 'G' && $bass_alter->item(0)->nodeValue == '-1'){
				       	$bass_step->item(0)->nodeValue = 'E';
				       	$bass_alter->item(0)->nodeValue = '-1';
			       	}
			       
		       }
		       if($bass_step->item(0)->nodeValue == 'G' && !($bass_alter->item(0))){
			       $bass_step->item(0)->nodeValue = 'E';
			       
			       $child = $dom->createElement("bass-alter");
			       $bass->appendChild($child);
			       $bass_alter = $bass->getElementsByTagName('bass-alter');
			       $bass_alter->item(0)->nodeValue = '';
		       }
		       // END		       
		       
		       if($bass_step->item(0)->nodeValue == 'A' && $bass_alter->item(0)){
			       	if($bass_step->item(0)->nodeValue == 'A' && $bass_alter->item(0)->nodeValue == '1'){
				       	$bass_step->item(0)->nodeValue = 'G';
				       	$bass_alter->item(0)->nodeValue = '';
			       	}
			       	if($bass_step->item(0)->nodeValue == 'A' && $bass_alter->item(0)->nodeValue == '-1'){
				       	$bass_step->item(0)->nodeValue = 'F';
				       	$bass_alter->item(0)->nodeValue = '';
			       	}
			       
		       }
		       if($bass_step->item(0)->nodeValue == 'A' && !($bass_alter->item(0))){
			       $bass_step->item(0)->nodeValue = 'F';
			       
			       $child = $dom->createElement("bass-alter");
			       $bass->appendChild($child);
			       $bass_alter = $bass->getElementsByTagName('bass-alter');
			       $bass_alter->item(0)->nodeValue = '1';
		       }
		       // END
		       
		       		       
		       if($bass_step->item(0)->nodeValue == 'B' && $bass_alter->item(0)){
			       	if($bass_step->item(0)->nodeValue == 'B' && $bass_alter->item(0)->nodeValue == '1'){
				       	$bass_step->item(0)->nodeValue = 'A';
				       	$bass_alter->item(0)->nodeValue = '';
			       	}
			       	if($bass_step->item(0)->nodeValue == 'B' && $bass_alter->item(0)->nodeValue == '-1'){
				       	$bass_step->item(0)->nodeValue = 'G';
				       	$bass_alter->item(0)->nodeValue = '';
			       	}
			       
		       }
		       if($bass_step->item(0)->nodeValue == 'B' && !($bass_alter->item(0))){
			       $bass_step->item(0)->nodeValue = 'A';
			       
			       $child = $dom->createElement("bass-alter");
			       $bass->appendChild($child);
			       $bass_alter = $bass->getElementsByTagName('bass-alter');
			       $bass_alter->item(0)->nodeValue = '-1';
		       }
		       // END		       
		       
		       
	       }
		   
	   }// END OF TRANSPOSING HARMONY'S BASS PART
     
       header("Content-type: text/xml");
       echo $dom->saveXML();
       
       
   }   
   $xml = OneAndHalfDown();
   
?>
