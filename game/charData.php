<?php
session_start();
error_reporting(0);
require_once("../static/connect.inc");


$aname = $_SESSION["game_charackter"];
$qry = mysql_query("SELECT `id` FROM `account` WHERE `name` = '$aname'");
$row = mysql_fetch_object($qry);
$aid = $row->id;
$qry = mysql_query("SELECT * FROM `account_character` WHERE `account_id` = '$aid'");
if($row = mysql_fetch_object($qry)){
	$c = $_GET["c"];
	if($c == 1){
		$cid1 = ($row->char1_id)?($row->char1_id):(0);
		$cid2 = ($row->char2_id)?($row->char1_id):(0);
		$cid3 = ($row->char3_id)?($row->char1_id):(0);
		$cid4 = ($row->char4_id)?($row->char1_id):(0);
	}elseif($c == 2){
		$cid1 = ($row->char2_id)?($row->char2_id):(0);
		$cid2 = ($row->char3_id)?($row->char3_id):(0);
		$cid3 = ($row->char4_id)?($row->char4_id):(0);
		$cid4 = ($row->char1_id)?($row->char1_id):(0);
	}elseif($c == 3){
		$cid1 = ($row->char3_id)?($row->char3_id):(0);
		$cid2 = ($row->char4_id)?($row->char4_id):(0);
		$cid3 = ($row->char1_id)?($row->char1_id):(0);
		$cid4 = ($row->char2_id)?($row->char2_id):(0);
	}elseif($c == 4){
		$cid1 = ($row->char4_id)?($row->char4_id):(0);
		$cid2 = ($row->char1_id)?($row->char1_id):(0);
		$cid3 = ($row->char2_id)?($row->char2_id):(0);
		$cid4 = ($row->char3_id)?($row->char3_id):(0);
	}else{
		$cid1 = ($row->char1_id)?($row->char1_id):(0);
		$cid2 = ($row->char2_id)?($row->char2_id):(0);
		$cid3 = ($row->char3_id)?($row->char3_id):(0);
		$cid4 = ($row->char4_id)?($row->char4_id):(0);
	}
	//von 2,3,4 frame im hintergrund laden
	
	$name = "";
	$gender = "";
	$race = "";
	$lvl = "";
	$vit = "";
	$int = "";
	$str = "";
	$dex = "";
	//gilde
	//spielzeit
	if($cid1 > 0){
		$qry = mysql_query("SELECT * FROM `player` WHERE `id` = '$cid1' AND `account_id` = '$aid'");
		if($row = mysql_fetch_object($qry)){
			$name = $row->name;
			$gender = $row->gender;
			$race = $row->race;
			$lvl = $row->level;
			$vit = $row->vit;
			$int = $row->int;
			$str = $row->str;
			$dex = $row->dex;
		}
	}else{
		echo "
			<input type='hidden' id='char_empire' value=''>
			<input type='hidden' id='char_guild' value='keine Gilde'>
			<input type='hidden' id='char_name' value=''>
			<input type='hidden' id='char_level' value=''>
			<input type='hidden' id='char_time' value='0'>
			<input type='hidden' id='char_vit' value='0'>
			<input type='hidden' id='char_int' value='0'>
			<input type='hidden' id='char_str' value='0'>
			<input type='hidden' id='char_dex' value='0'>
		";
	}
}
?>