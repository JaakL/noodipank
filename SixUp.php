<?php
   function SixUp($location)
   {
       $dom = new DOMDocument();
       $dom->load($location); 					// 	See koht tuleb ära muuta nii, et võtaks Laikre poolt üles laetud ja kliendi poolt valitud laulu XML'i. Hetkel lihtsalt testimiseks üks fail.
       $xpath = new DOMXPath($dom);
      
      
       $count = $dom->getElementsByTagName('measure')->length;
       $count = round($count/4);
       $measures = $xpath->query('//measure');
		 
       for ($i = $count; $i < $measures->length; $i++) {
		    $temp = $measures->item($i); //avoid calling a function twice
		    $temp->parentNode->removeChild($temp);
		}
      
      /*GET THE NODE NEEDED TO TRANSPOSE NOTES*/
      $notes = $xpath->query('//note/pitch');
       
       /*TRANSPOSING NOTES*/
       foreach($notes as $note){
	
      	 	$octave = $note->getElementsByTagName('octave');
       	 	
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
   		   
	   }// END OF TRANSPOSING HARMONY'S BASS PART
            $dom->save('sixup.xml');
   }    
?>
