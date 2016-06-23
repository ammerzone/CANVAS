<?php
function checkAnum($wert){
	$checkit = preg_match("/^[a-zA-Z0-9]+$/",$wert);
	if($checkit)	return true;
	else			return false;
}
function checkIP($wert){
	$checkit = preg_match("/^[0-9\*]{1,3}+\.[0-9\*]{1,3}+\.[0-9\*]{1,3}+\.[0-9\*]{1,3}+$/",$wert);
	if($checkit) 	return true;
	else 			return false;
}
function checkName($wert){
	$checkit = preg_match("/^[a-zA-Z0-9[:space:]]+$/",$wert);
	if($checkit) 	return true;
	else 			return false;
}
function checkVoucher($wert){
	$checkit = preg_match("/^[0-9]+[0-9\-]+[0-9]+$/",$wert);
	$wert = str_replace('-','',$wert);
	if($checkit && strlen($wert)>=16 && strlen($wert)<=25) 	return true;
	else 													return false;
}
function checkPwd($wert){
	$checkit = preg_match("/^[a-zA-Z0-9[:space:]]+$/",$wert);
	if($checkit) 	return true;
	else 			return false;
}
function checkMail($string){
	if(preg_match("/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9\.-]+\.[a-zA-Z]{2,4}$/", $string)) 	return true;
	else 																			return false; 
}
function checkInt($wert){
	$checkit = preg_match("/^[0-9]+$/",$wert);
	if($checkit) 	return true;
	else 			return false;
}
function checkRate($wert){
	if(preg_match("/^[1-9]+\.[0-9]+$/",$wert) || $wert>0) 	return true;
	else 													return false;
}
function getDatum($timeStamp=0){
	return date("d.m.Y",$timeStamp);
}
function getZeit($timeStamp=0){
	return date("H:i",$timeStamp);
}
function sysmsg($text){
	echo "
		<div id='sysmsg'>
			".$text."!<br>
			<a 	href='#' 
				onclick='	$(\"#sysmsg\").fadeOut(500);
							return false;'>
				<small><u>Schlie&szlig;en</u></small>
			</a>
			<div id='closeSysmsg' onclick='$(\"#sysmsg\").fadeOut(500);'>X</div>
		</div>
	";
}




if(isset($_POST['login'])){
	if(!empty($_POST['username']) && !empty($_POST['passwort'])){
		$name = $_POST['username'];
		$pw2 = md5($_POST['passwort']);
		$qry = mysql_query("SELECT * FROM `account` WHERE `username` = '$name' AND `passwort` = '$pw2'");
		if($row = mysql_fetch_object($qry)){
			$_SESSION['game_login'] = "charackter";
			$_SESSION['game_charackter'] = $name;
			$aid = $row->id;
			$qry = mysql_query("SELECT * FROM `account_character` WHERE `account_id` = '$aid'");
			if(!mysql_fetch_object($qry)){
				$qry = mysql_query("INSERT INTO `account_character` (`accout_id`) = ('$aid')");
			}
		}else{ sysmsg("Fehler: Dieser Account existiert nicht!"); }
	}else{ sysmsg("Bitte alle Felder ausfüllen!"); }
}
if(isset($_POST['register'])){
	if(!empty($_POST["username"]) && !empty($_POST["passwort1"]) && !empty($_POST["passwort2"]) && !empty($_POST["mail1"]) && !empty($_POST["mail2"])){
		if(strlen($_POST["username"]) >= 3 && strlen($_POST["username"]) <= 32){
			if(strlen($_POST["passwort1"]) >= 5 && strlen($_POST["passwort1"]) <= 32){
				if(checkAnum($_POST["passwort1"]) && checkAnum($_POST["username"])){
					if(checkAnum($_POST["loeschcode"]) && strlen($_POST["loeschcode"]) == 7){
						if($_POST['captcha'] == $_SESSION['captcha_id']){
							$name = $_POST["username"];
							$qry = mysql_query("SELECT * FROM `account` WHERE `username` = '$name'");
							if(!mysql_fetch_object($qry)){
								if($_POST["passwort1"] == $_POST["passwort2"]){
									if($_POST["mail1"] == $_POST["mail2"]){
										if(filter_var($_POST["mail1"], FILTER_VALIDATE_EMAIL)){
											$name = mysql_real_escape_string($_POST["username"]);
											$pw = md5(mysql_real_escape_string($_POST["passwort1"]));
											$mail = mysql_real_escape_string($_POST["mail1"]);
											$lcode = $_POST["loeschcode"];
											$time = time();
											$ip = mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
											$qry = mysql_query("INSERT INTO `account` 
												(`username`, `passwort`, `mail`, `loeschcode`, `create_time`, `web_ip`) VALUES 
												('$name', '$pw', '$mail', '$lcode', '$time', '$ip')");
											sysmsg("Der Account '".$_POST['username']."' konnte erfolgreich angelegt werden, Sie können sich nun anmelden!");
										}else{ sysmsg("Fehler: Invalide E-Mail Adresse!"); }
									}else{ sysmsg("Fehler: Mail-Adressen nicht identisch!"); }
								}else{ sysmsg("Fehler: Passwörter nicht identisch!"); }
							}else{ sysmsg("Fehler: Ein anderer Account hat bereits diesen Namen!"); }
						}else{ sysmsg("Fehler: Falscher Captcha!"); }
					}else{ sysmsg("Fehler: Löschcode fehlerhaft (nicht 7 Zeichen oder nur a-Z,0-9)!"); }
				}else{ sysmsg("Fehler: Passwort oder Username enthält unzulässige Sonderzeichen!"); }
			}else{ sysmsg("Fehler: Passwort muss zwischen 5 und 32 Zeichen land sein!"); }
		}else{ sysmsg("Fehler: Username muss zwischen 3 und 32 Zeichen lang sein!"); }
	}else{ sysmsg("Fehler: Es wurden nicht alle Felder ausgefüllt!"); }
}
?>