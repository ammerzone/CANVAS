<?php
error_reporting(0);
require_once("../static/connect.inc");
$qry = mysql_query("SELECT * FROM `` WHERE ");
if(!file_exists("database/player.cfg")){
	$f = fopen("database/player.cfg", "w+");
	fwrite($f, "24;14\n");			//POSITIONS
	fwrite($f, "1\n");				//LEVEL
	fwrite($f, "0\n");				//EXP
	fwrite($f, "100\n");			//SPEED
	fwrite($f, "100;100;100\n");	//TP;MP;ENDURANCE
	fwrite($f, "1;1;1;1\n");		//VIT;INT;STR;DEX
	fwrite($f, "1;1;100;100\n");	//SCHADEN (physisch, magisch, Angriffsgeschwindigkeit, Zaubergeschwindigkeit)
	fwrite($f, "1;1;0;0;0;0\n");	//VERTEIDIGUNG (physisch, magisch, gift, feuer, wind, blitz)
	fwrite($f, "0;0;0;0;0\n");		//OFFENSIV (Kritischer Treffer, Durchbohrender Treffer, Ohnmacht, Verlangsamen, Vergiften)
	fwrite($f, "0;0;0;0;0;0;0\n");	//DEFENSIV (Abw. Ohnmacht, Abw. Verlangsamen, Nahkampftreffer reflektieren, Angriff abbocken, Pfeil ausweichen, TP-absorbieren, MP-absorbieren)
	fwrite($f, "0;0;0;0;0;0\n");	//DEFENSIV (Schwertverteidigung, Zweihandverteidigung, Dolchverteidigung, Glockenverteidigung, Faecherverteidigung, Pfeilwiederstand)
	fclose($f);
}

echo "<input type='hidden' id='skill1_id' value='0'>\n";
echo "<input type='hidden' id='skill1_level' value=''>\n";
echo "<input type='hidden' id='skill2_id' value='0'>\n";
echo "<input type='hidden' id='skill2_level' value=''>\n";
echo "<input type='hidden' id='skill3_id' value='0'>\n";
echo "<input type='hidden' id='skill3_level' value=''>\n";
echo "<input type='hidden' id='skill4_id' value='0'>\n";
echo "<input type='hidden' id='skill4_level' value=''>\n";
echo "<input type='hidden' id='skill5_id' value='0'>\n";
echo "<input type='hidden' id='skill5_level' value=''>\n";
echo "<input type='hidden' id='skill6_id' value='0'>\n";
echo "<input type='hidden' id='skill6_level' value=''>\n";
echo "<input type='hidden' id='skill7_id' value='0'>\n";
echo "<input type='hidden' id='skill7_level' value=''>\n";
echo "<input type='hidden' id='skill8_id' value='0'>\n";
echo "<input type='hidden' id='skill8_level' value=''>\n";

$f = file("database/player.cfg");
foreach($f as $line => $data){
	$data = str_replace("\n", "", $data);
	switch($line){
		case 0: 	
			$position = $data; 
			$koord = explode(";", $position);
			echo "<input type='hidden' id='player_xPos' value='".$koord[0]."'>\n";
			echo "<input type='hidden' id='player_yPos' value='".$koord[1]."'>\n";
			break;
		case 1: 	echo "<input type='hidden' id='player_level' value='".$data."'>\n"; $lvl = $data; break;
		case 2: 	echo "<input type='hidden' id='player_exp' value='".$data."'>\n"; break;
		case 3: 	echo "<input type='hidden' id='player_speed' value='".$data."'>\n"; break;
		case 4: 	
			$position = $data; 
			$life = explode(";", $position);
			echo "<input type='hidden' id='player_TP' value='".$life[0]."'>\n";
			echo "<input type='hidden' id='player_MP' value='".$life[1]."'>\n";
			echo "<input type='hidden' id='player_END' value='".$life[2]."'>\n";
			break;
		case 5: 	
			$position = $data; 
			$stat = explode(";", $position);
			echo "<input type='hidden' id='player_vit' value='".$stat[0]."'>\n";
			echo "<input type='hidden' id='player_int' value='".$stat[1]."'>\n";
			echo "<input type='hidden' id='player_str' value='".$stat[2]."'>\n";
			echo "<input type='hidden' id='player_dex' value='".$stat[3]."'>\n";
			break;
		case 6: 
			$position = $data; 
			$schaden = explode(";", $position);
			echo "<input type='hidden' id='player_schaden_physisch' value='".$schaden[0]."'>\n";
			echo "<input type='hidden' id='player_schaden_magisch' value='".$schaden[1]."'>\n";
			echo "<input type='hidden' id='player_schaden_speedAngriff' value='".$schaden[2]."'>\n";
			echo "<input type='hidden' id='player_schaden_speedMagie' value='".$schaden[3]."'>\n";
		case 7: 
			$position = $data; 
			$verteidigung = explode(";", $position);
			echo "<input type='hidden' id='player_verteidigung_physisch' value='".$verteidigung[0]."'>\n";
			echo "<input type='hidden' id='player_verteidigung_magisch' value='".$verteidigung[1]."'>\n";
			echo "<input type='hidden' id='player_verteidigung_gift' value='".$verteidigung[2]."'>\n";
			echo "<input type='hidden' id='player_verteidigung_feuer' value='".$verteidigung[3]."'>\n";
			echo "<input type='hidden' id='player_verteidigung_wind' value='".$verteidigung[4]."'>\n";
			echo "<input type='hidden' id='player_verteidigung_blitz' value='".$verteidigung[5]."'>\n";
		case 8: 
			$position = $data; 
			$offensiv = explode(";", $position);
			echo "<input type='hidden' id='player_offensiv_kritisch' value='".$offensiv[0]."'>\n";
			echo "<input type='hidden' id='player_offensiv_durchbohrend' value='".$offensiv[1]."'>\n";
			echo "<input type='hidden' id='player_offensiv_ohnmacht' value='".$offensiv[2]."'>\n";
			echo "<input type='hidden' id='player_offensiv_verlangsamen' value='".$offensiv[3]."'>\n";
			echo "<input type='hidden' id='player_offensiv_vergiften' value='".$offensiv[4]."'>\n"; 
		case 9: 
			$position = $data; 
			$defensiv = explode(";", $position);
			echo "<input type='hidden' id='player_defensiv_ohnmacht' value='".$defensiv[0]."'>\n";
			echo "<input type='hidden' id='player_defensiv_verlangsamen' value='".$defensiv[1]."'>\n";
			echo "<input type='hidden' id='player_defensiv_nahkampf' value='".$defensiv[2]."'>\n";
			echo "<input type='hidden' id='player_defensiv_abblocken' value='".$defensiv[3]."'>\n";
			echo "<input type='hidden' id='player_defensiv_pfeil' value='".$defensiv[4]."'>\n";
			echo "<input type='hidden' id='player_defensiv_absorbTP' value='".$defensiv[5]."'>\n";
			echo "<input type='hidden' id='player_defensiv_absorbMP' value='".$defensiv[6]."'>\n";
		case 10: 
			$position = $data; 
			$defensiv = explode(";", $position);
			echo "<input type='hidden' id='player_defensiv_schwert' value='".$defensiv[0]."'>\n";
			echo "<input type='hidden' id='player_defensiv_langschwert' value='".$defensiv[1]."'>\n";
			echo "<input type='hidden' id='player_defensiv_dolch' value='".$defensiv[2]."'>\n";
			echo "<input type='hidden' id='player_defensiv_glocke' value='".$defensiv[3]."'>\n";
			echo "<input type='hidden' id='player_defensiv_faecher' value='".$defensiv[4]."'>\n";
			echo "<input type='hidden' id='player_defensiv_pfeil' value='".$defensiv[5]."'>\n";
		case 11: 	
			$skill1 = $data; 
			$value = explode(";", $skill1);
			echo "<script>document.getElementById('skill1_id').value = ".$value[0].";</script>\n";
			echo "<script>document.getElementById('skill1_level').value = ".$value[1].";</script>\n";
			break;
		case 12: 	
			$skill2 = $data; 
			$value = explode(";", $skill2);
			echo "<script>document.getElementById('skill2_id').value = ".$value[0].";</script>\n";
			echo "<script>document.getElementById('skill2_level').value = ".$value[1].";</script>\n";
			break;
		case 13: 	
			$skill3 = $data; 
			$value = explode(";", $skill3);
			echo "<script>document.getElementById('skill3_id').value = ".$value[0].";</script>\n";
			echo "<script>document.getElementById('skill3_level').value = ".$value[1].";</script>\n";
			break;
		case 14: 	
			$skill4 = $data; 
			$value = explode(";", $skill4);
			echo "<script>document.getElementById('skill4_id').value = ".$value[0].";</script>\n";
			echo "<script>document.getElementById('skill4_level').value = ".$value[1].";</script>\n";
			break;
		case 15: 	
			$skill5 = $data; 
			$value = explode(";", $skill5);
			echo "<script>document.getElementById('skill5_id').value = ".$value[0].";</script>\n";
			echo "<script>document.getElementById('skill5_level').value = ".$value[1].";</script>\n";
			break;
		case 16: 	
			$skill6 = $data; 
			$value = explode(";", $skill6);
			echo "<script>document.getElementById('skill6_id').value = ".$value[0].";</script>\n";
			echo "<script>document.getElementById('skill6_level').value = ".$value[1].";</script>\n";
			break;
		case 17: 	
			$skill7 = $data; 
			$value = explode(";", $skill7);
			echo "<script>document.getElementById('skill7_id').value = ".$value[0].";</script>\n";
			echo "<script>document.getElementById('skill7_level').value = ".$value[1].";</script>\n";
			break;
		case 18: 
			$skill8 = $data; 
			$value = explode(";", $skill8);
			echo "<script>document.getElementById('skill8_id').value = ".$value[0].";</script>\n";
			echo "<script>document.getElementById('skill8_level').value = ".$value[1].";</script>\n";
			break;	
		default: break;
	}
}
$f = file("database/level.cfg");
foreach($f as $line => $data){
	$data = str_replace("\n", "", $data);
	if($line == $lvl-1)		echo "<input type='hidden' id='player_expNeed' value='".$data."'>\n";
}


mysql_connect($mysql_connect);
?>