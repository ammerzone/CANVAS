<?php
require_once("static/connect.inc");

$query = mysql_query("SELECT * FROM `map` WHERE `isle` = 'main'");
if(!mysql_fetch_object($query)){
	$img = imagecreatefrompng("img/isles/main.png");
	$xdim = imagesx($img);
	$ydim = imagesy($img);
	for($x = 1; $x <= $xdim-1; $x++){
		for($y = 1; $y <= $ydim-1; $y++){
			$clr = Imagecolorat($img, $x, $y);  
			$rgb = imagecolorsforindex($img,$clr); 
			$color = "#".dechex($rgb["red"]).dechex($rgb["blue"]).dechex($rgb["green"]);
			if($color != "#ffffff"){
				//festland
				$rx1 = $x;
				$ry1 = $y;
				//mysql_query("INSERT INTO `map` (`isle`, `x`, `y`) VALUES ('main', '$rx1', '$ry1')");
			}
		}
	}
}else{
	$query = mysql_query("SELECT * FROM `map` WHERE `isle` = 'main' AND `fill` = ''");
	if(!mysql_fetch_object($query)){
		$query = mysql_query("SELECT * FROM `map` WHERE `isle` = 'main' AND `x` = 0");
		while($row = mysql_fetch_object($query)){
			$x = $row->x;
			$y = $row->y;
			$isle = $row->isle;
			$fill = "";
			for($i = 1; $i <= 64; $i++){
				$fill .= rand(25,35).",";
			}
			//mysql_query("UPDATE `map` SET `fill` = '$fill' WHERE `isle` = '$isle' AND `x` = '$x' AND `y` = '$y'");
		}
	}
}
?>