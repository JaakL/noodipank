<?php
   function fnDOMEditNoodiElement()
   {
       $dom = new DOMDocument();
       $dom->load('TulbidJaBonsai_NP.xml');  	// 	See koht tuleb ära muuta nii, et võtaks Laikre poolt üles laetud ja kliendi poolt valitud laulu XML'i. Hetkel lihtsalt testimiseks üks fail.
       $noot = $dom->documentElement;
       $xpath = new DOMXPath($dom);
       $result = $xpath->query('/score-partwise/part/measure/attributes/key/fifths');
       /*Helistiku märkide muutmine*/
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
       
       header("Content-type: text/xml");
       echo $dom->saveXML();
       
   }   
   $proov = fnDOMEditNoodiElement();
?>
