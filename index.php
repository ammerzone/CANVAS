<?php
	session_start();
	error_reporting(0);
	require_once("static/connect.inc");
	include_once("static/functions.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="robots"   content="index, follow">
		<meta name="distribution" content="global">
		<meta http-equiv="Content-Language" content="DE">
		<meta http-equiv="cache-control" content="max-age=3600">
		<meta name="revisit-after" content="1 month">
		<meta name="googlebot" content="code">
		<meta name="rating" content="12 years">
		
		<meta name="company" content="Apofines Gameplay">
		<meta name="publisher" content="Jules Rau feat. Apofines Gameplay">
		<meta name="web-author" content="Jules Rau">
		<meta name="copyright" content="&copy; Jules Rau">
		<meta name="page-topic" content="online-game">
		<meta name="reply-to" content="jules.rau@gmx.de">
		<meta name="generator" content="Notepad++">
		<meta name="page-type" content="">
		<meta name="audience" content="all">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html charset=iso-8859-1">
		<meta http-equiv="Content-Style-Type" content="text/css">
		<meta http-equiv="Content-Script-Type" content="text/javascript">
		
		<title>Metin2 - 2D-Retro Game</title>
		
		<link rel="stylesheet" href="css/main.css" type="text/css" />
		<script src="js/jquery.js" async type="text/javascript"></script>
	</head>
	<body>
		<script type="text/javascript">
			var keysDown = {};
			function setKey(event, status){
				var code = event.keyCode;
				var key;
				switch(code){
					case 13:	key = 'ENTER'; break;
					case 17: 	key = 'STRG'; break;
					case 27: 	key = 'ESC'; break;
					case 36:	key = 'SPACE'; break;
					case 37:	key = 'LEFT'; break;
					case 38:	key = 'UP'; break;
					case 39:	key = 'RIGHT'; break;
					case 40:	key = 'DOWN'; break;
					case 112:	key = 'F1'; break;
					case 113:	key = 'F2'; break;
					case 114:	key = 'F3'; break;
					case 115:	key = 'F4'; break;
					default:	key = String.fromCharCode(code);
				}
				keysDown[key] = status;
			}
			var mouseX = 0, mouseY = 0;
			var mouseXright = 0, mouseYright = 0;
			function mousePosition(e){
				if(!e){ window.event; }
				if((e.type && e.type == "contextmenu") || (e.button && e.button == 2) || (e.which && e.which == 3)){
					mouseXright = e.pageX || e.clientX + document.body.scrollLeft;
					mouseYright = e.pageY || e.clientY + document.body.scrollTop;
					e.preventDefault();
				}else{
					mouseX = e.pageX || e.clientX + document.body.scrollLeft;
					mouseY = e.pageY || e.clientY + document.body.scrollTop;
				}
			}
			var mouseXmove = 0, mouseYmove = 0;
			function mouseMovement(e){
				if(!e){ window.event; }
				mouseXmove = e.pageX || e.clientX + document.body.scrollLeft;
				mouseYmove = e.pageY || e.clientY + document.body.scrollTop;
			}
			document.addEventListener('keydown', function(e){ setKey(e, true); });
			document.addEventListener('keyup', function(e){ setKey(e, false); });
			document.addEventListener('click', function(e){ mousePosition(e); }, false);
			document.addEventListener('contextmenu', function(e){ mousePosition(e); }, false);
			document.addEventListener('mousemove', function(e){ mouseMovement(e); }, false);
			window.addEventListener('blur', function(){ keysDown = {};});
			window.input = {isDown: function(key){return keysDown[key.toUpperCase()];}};
		</script>
		<?php
		
		
		if(!$_SESSION["game_login"] || $_SESSION["game_login"] == "charackter"){
			if($_SESSION["game_login"] == "charackter"){
				//CHARAKTERWAHL
				include_once("static/character.php");
			}else{
				//LOGINSEITE
				include_once("static/login.php");
			}
		}else{
		?>
			<?php include_once("game/mapvalues.php"); ?>
			<div id="playervalues">
				<input type='hidden' id='player_xPos' value='0'>
				<input type='hidden' id='player_yPos' value='0'>
				<input type='hidden' id='player_level' value='1'>
				<input type='hidden' id='player_exp' value='0'>
				<input type='hidden' id='player_speed' value='100'>
				<input type='hidden' id='player_TP' value='100'>
				<input type='hidden' id='player_MP' value='100'>
				<input type='hidden' id='player_END' value='100'>
				<input type='hidden' id='player_vit' value='0'>
				<input type='hidden' id='player_int' value='0'>
				<input type='hidden' id='player_str' value='0'>
				<input type='hidden' id='player_dex' value='0'>
				<input type='hidden' id='player_schaden_physisch' value='1'>
				<input type='hidden' id='player_schaden_magisch' value='1'>
				<input type='hidden' id='player_schaden_speedAngriff' value='100'>
				<input type='hidden' id='player_schaden_speedMagie' value='100'>
				<input type='hidden' id='player_verteidigung_physisch' value='1'>
				<input type='hidden' id='player_verteidigung_magisch' value='1'>
				<input type='hidden' id='player_verteidigung_gift' value='0'>
				<input type='hidden' id='player_verteidigung_feuer' value='0'>
				<input type='hidden' id='player_verteidigung_wind' value='0'>
				<input type='hidden' id='player_verteidigung_blitz' value='0'>
				<input type='hidden' id='player_offensiv_kritisch' value='0'>
				<input type='hidden' id='player_offensiv_durchbohrend' value='0'>
				<input type='hidden' id='player_offensiv_ohnmacht' value='0'>
				<input type='hidden' id='player_offensiv_verlangsamen' value='0'>
				<input type='hidden' id='player_offensiv_vergiften' value='0'>
				<input type='hidden' id='player_defensiv_ohnmacht' value='0'>
				<input type='hidden' id='player_defensiv_verlangsamen' value='0'>
				<input type='hidden' id='player_defensiv_nahkampf' value='0'>
				<input type='hidden' id='player_defensiv_abblocken' value='0'>
				<input type='hidden' id='player_defensiv_pfeil' value='0'>
				<input type='hidden' id='player_defensiv_absorbTP' value='0'>
				<input type='hidden' id='player_defensiv_absorbMP' value='0'>
				<input type='hidden' id='player_defensiv_schwert' value='0'>
				<input type='hidden' id='player_defensiv_langschwert' value='0'>
				<input type='hidden' id='player_defensiv_dolch' value='0'>
				<input type='hidden' id='player_defensiv_glocke' value='0'>
				<input type='hidden' id='player_defensiv_faecher' value='0'>
				<input type='hidden' id='player_defensiv_pfeil' value='0'>
				<input type='hidden' id='skill1_id' value=''>
				<input type='hidden' id='skill1_level' value='0'>
				<input type='hidden' id='skill2_id' value=''>
				<input type='hidden' id='skill2_level' value='0'>
				<input type='hidden' id='skill3_id' value=''>
				<input type='hidden' id='skill3_level' value='0'>
				<input type='hidden' id='skill4_id' value=''>
				<input type='hidden' id='skill4_level' value='0'>
				<input type='hidden' id='skill5_id' value=''>
				<input type='hidden' id='skill5_level' value='0'>
				<input type='hidden' id='skill6_id' value=''>
				<input type='hidden' id='skill6_level' value='0'>
				<input type='hidden' id='skill7_id' value=''>
				<input type='hidden' id='skill7_level' value='0'>
				<input type='hidden' id='skill8_id' value=''>
				<input type='hidden' id='skill8_level' value='0'>
				<input type='hidden' id='player_expNeed' value='9999999999'>
			</div>
			<div id="items">
				<!-- PAGE 1 -->
				<input type='hidden' id='item_1' value='0'>
				<input type='hidden' id='item_2' value='0'>
				<input type='hidden' id='item_3' value='0'>
				<input type='hidden' id='item_4' value='0'>
				<input type='hidden' id='item_5' value='0'>
				<input type='hidden' id='item_6' value='0'>
				<input type='hidden' id='item_7' value='0'>
				<input type='hidden' id='item_8' value='0'>
				<input type='hidden' id='item_9' value='0'>
				<input type='hidden' id='item_10' value='0'>
				<input type='hidden' id='item_11' value='0'>
				<input type='hidden' id='item_12' value='0'>
				<input type='hidden' id='item_13' value='0'>
				<input type='hidden' id='item_14' value='0'>
				<input type='hidden' id='item_15' value='0'>
				<input type='hidden' id='item_16' value='0'>
				<input type='hidden' id='item_17' value='0'>
				<input type='hidden' id='item_18' value='0'>
				<input type='hidden' id='item_19' value='0'>
				<input type='hidden' id='item_20' value='0'>
				<input type='hidden' id='item_21' value='0'>
				<input type='hidden' id='item_22' value='0'>
				<input type='hidden' id='item_23' value='0'>
				<input type='hidden' id='item_24' value='0'>
				<input type='hidden' id='item_25' value='0'>
				<input type='hidden' id='item_26' value='0'>
				<input type='hidden' id='item_27' value='0'>
				<input type='hidden' id='item_28' value='0'>
				<input type='hidden' id='item_29' value='0'>
				<input type='hidden' id='item_30' value='0'>
				<input type='hidden' id='item_31' value='0'>
				<input type='hidden' id='item_32' value='0'>
				<input type='hidden' id='item_33' value='0'>
				<input type='hidden' id='item_34' value='0'>
				<input type='hidden' id='item_35' value='0'>
				<input type='hidden' id='item_36' value='0'>
				<input type='hidden' id='item_37' value='0'>
				<input type='hidden' id='item_38' value='0'>
				<input type='hidden' id='item_39' value='0'>
				<input type='hidden' id='item_40' value='0'>
				<input type='hidden' id='item_41' value='0'>
				<input type='hidden' id='item_42' value='0'>
				<input type='hidden' id='item_43' value='0'>
				<input type='hidden' id='item_44' value='0'>
				<input type='hidden' id='item_45' value='0'>
				<!-- PAGE 2 -->
				<input type='hidden' id='item_46' value='0'>
				<input type='hidden' id='item_47' value='0'>
				<input type='hidden' id='item_48' value='0'>
				<input type='hidden' id='item_49' value='0'>
				<input type='hidden' id='item_50' value='0'>
				<input type='hidden' id='item_51' value='0'>
				<input type='hidden' id='item_52' value='0'>
				<input type='hidden' id='item_53' value='0'>
				<input type='hidden' id='item_54' value='0'>
				<input type='hidden' id='item_55' value='0'>
				<input type='hidden' id='item_56' value='0'>
				<input type='hidden' id='item_57' value='0'>
				<input type='hidden' id='item_58' value='0'>
				<input type='hidden' id='item_59' value='0'>
				<input type='hidden' id='item_60' value='0'>
				<input type='hidden' id='item_61' value='0'>
				<input type='hidden' id='item_62' value='0'>
				<input type='hidden' id='item_63' value='0'>
				<input type='hidden' id='item_64' value='0'>
				<input type='hidden' id='item_65' value='0'>
				<input type='hidden' id='item_66' value='0'>
				<input type='hidden' id='item_67' value='0'>
				<input type='hidden' id='item_68' value='0'>
				<input type='hidden' id='item_69' value='0'>
				<input type='hidden' id='item_70' value='0'>
				<input type='hidden' id='item_71' value='0'>
				<input type='hidden' id='item_72' value='0'>
				<input type='hidden' id='item_73' value='0'>
				<input type='hidden' id='item_74' value='0'>
				<input type='hidden' id='item_75' value='0'>
				<input type='hidden' id='item_76' value='0'>
				<input type='hidden' id='item_77' value='0'>
				<input type='hidden' id='item_78' value='0'>
				<input type='hidden' id='item_79' value='0'>
				<input type='hidden' id='item_80' value='0'>
				<input type='hidden' id='item_81' value='0'>
				<input type='hidden' id='item_82' value='0'>
				<input type='hidden' id='item_83' value='0'>
				<input type='hidden' id='item_84' value='0'>
				<input type='hidden' id='item_85' value='0'>
				<input type='hidden' id='item_86' value='0'>
				<input type='hidden' id='item_87' value='0'>
				<input type='hidden' id='item_88' value='0'>
				<input type='hidden' id='item_89' value='0'>
				<input type='hidden' id='item_90' value='0'>
			</div>
			<div id="update"></div>
			<script src="js/game.js" type="text/javascript"></script>
			<script src="js/navigation.js" type="text/javascript"></script>
			<script src="js/inventory.js" type="text/javascript"></script>
			<script src="js/character.js" type="text/javascript"></script>
			<script src="js/windowClose.js" type="text/javascript"></script>
		<?php
		}
		mysql_connect($mysql_connect);
		?>
	</body>
</html>