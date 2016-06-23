<?php 
echo "<script>\n";
echo "var mapValue = new Array();\n";

$f = scandir("img/map/");
foreach($f as $koord){
	if(strlen($koord) >= 10){
		$out = explode(".", $koord);
		$out2 = explode("][", $out[0]);
		$out2 = str_replace("[", "", $out2);
		$out2 = str_replace("]", "", $out2);
		$x = $out2[1];
		$y = $out2[0];
	}
}
echo "var mapSizeX = ".++$x.";\n";
echo "var mapSizeY = ".++$y.";\n";
echo "</script>\n";
?>