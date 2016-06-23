<?php
echo "<div id='lginbox'>";
if(!$_GET["a"] || $_GET["a"] == "login"){
	include_once("static/lgin/loginformular.php");
}elseif($_GET["a"] == "register"){
	include_once("static/lgin/registerformular.php");
}
echo "</div>";
?>