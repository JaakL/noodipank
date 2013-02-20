<?php
   function Zero($location)
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
      
            $dom->save('zero.xml');
   }
?>
