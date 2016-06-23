<?php
error_reporting(0);
if($_GET["update"] == 1){				//DROP ITEM
	$t1 = "";
	$t2 = "";
	$f = file("database/inventory.cfg");
	foreach($f as $line => $data){
		if($line < $_GET["item"]){
			$t1 .= $data;
		}
		if($line > $_GET["item"]){
			$t2 .= $data;
		}
	}
	$f = fopen("database/inventory.cfg", "w+");
	fwrite($f, $t1);
	fwrite($f, "0\n");
	fwrite($f, $t2);
	fclose($f);
	
	//->drop item to actual position
	
}elseif($_GET["update"] == 2){			//MOVE ITEM TO ANOTHER POSITION
	if($_GET["item"] != $_GET["itemNew"]){
		$t1 = "";
		$t2 = "";
		$t3 = "";
		$itemNewName_2 = "0\n";
		$itemNewName_1 = "0\n";
		$itemNewName2 = "0\n";
		$itemNewName3 = "0\n";
		$f = file("database/inventory.cfg");
		foreach($f as $line => $data){
			if($_GET["item"] < $_GET["itemNew"]){
				if($line < $_GET["item"])								$t1 .= $data;
				if($line > $_GET["item"] && $line < $_GET["itemNew"])	$t2 .= $data;
				if($line > $_GET["itemNew"])							$t3 .= $data;
				if($line == $_GET["item"])		$itemName = $data;
				if($line == $_GET["itemNew"])	$itemNewName = $data;
				if($line == $_GET["itemNew"]+5 && $line < 40)	$itemNewName2 = $data;
				if($line == $_GET["itemNew"]+10 && $line < 35)	$itemNewName3 = $data;
				if($line == $_GET["itemNew"]-5 && $line > 5)	$itemNewName_1 = $data;
				if($line == $_GET["itemNew"]-10 && $line > 10)	$itemNewName_2 = $data;
			}else{
				if($line < $_GET["itemNew"])							$t1 .= $data;
				if($line > $_GET["itemNew"] && $line < $_GET["item"])	$t2 .= $data;
				if($line > $_GET["item"])								$t3 .= $data;
				if($line == $_GET["item"])		$itemName = $data;
				if($line == $_GET["itemNew"])	$itemNewName = $data;
				if($line == $_GET["itemNew"]+5 && $line < 40)	$itemNewName2 = $data;
				if($line == $_GET["itemNew"]+10 && $line < 35)	$itemNewName3 = $data;
				if($line == $_GET["itemNew"]-5 && $line > 5)	$itemNewName_1 = $data;
				if($line == $_GET["itemNew"]-10 && $line > 10)	$itemNewName_2 = $data;
			}
		}
		$itemName = str_replace("\n", "", $itemName);
		$itemNewName_1 = str_replace("\n", "", $itemNewName_1);
		$itemNewName_2 = str_replace("\n", "", $itemNewName_2);
		$img = getimagesize("../img/item/".$itemName.".png");
		$img_1 = (file_exists("../img/item/".$itemNewName_1.".png"))?(getimagesize("../img/item/".$itemNewName_1.".png")):(0);
		$img_2 = (file_exists("../img/item/".$itemNewName_2.".png"))?(getimagesize("../img/item/".$itemNewName_2.".png")):(0);
		if(	(ceil($img[1]/32) == 1 && $itemNewName == "0\n") || 
			(ceil($img[1]/32) == 2 && $itemNewName == "0\n" && $itemNewName2 == "0\n") || 
			(ceil($img[1]/32) == 3 && $itemNewName == "0\n" && $itemNewName2 == "0\n" && $itemNewName3 == "0\n") || 
			(ceil($img_1[1]/32) == 2 && $itemNewName_1 != "0\n") || 
			(ceil($img_2[1]/32) == 3 && $itemNewName_2 != "0\n")){
				
			$f = fopen("database/inventory.cfg", "w+");
			if(strlen($t1) > 0) 	fwrite($f, $t1);
									fwrite($f, ($_GET["item"]<$_GET["itemNew"])?("0\n"):($itemName."\n"));
			if(strlen($t2) > 0) 	fwrite($f, $t2);
									fwrite($f, ($_GET["item"]<$_GET["itemNew"])?($itemName."\n"):("0\n"));
			if(strlen($t3) > 0) 	fwrite($f, $t3);
			fclose($f);
		}
	}
}else{
	if(!file_exists("database/inventory.cfg")){
		$f = fopen("database/inventory.cfg", "w+");
		for($i=0;$i<90;$i++){
			fwrite($f, "0\n");
		}
		fclose($f);
	}
	$i = 0;
	$f = file("database/inventory.cfg");
	foreach($f as $line => $data){
		$data = str_replace("\n", "", $data);
		echo "<input type='hidden' id='item_".$line."' value='".$data."'>\n";
	}
}
?>