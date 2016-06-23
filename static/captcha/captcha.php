<?php
	session_start();
	header("Content-Type: image/png");                                // Sets the Content of this file to an PNG-Image
	$ttf = "./franconi.ttf";                                          //Schriftart 
	$_SESSION["captcha_id"] = "";                                     // Clears the old value
	$zufallszahl = mt_rand(50000,60000);                              // Generates a random number between 50000 and 60000
	$_SESSION["captcha_id"] = $zufallszahl;                           // Sets the value of the session
	$bild = imagecreatefromgif("bg.gif");                             // Creates a new image from background file
	$weisser = imagecolorallocate($bild, 255, 255, 255);              // Sets white text color
	imagettftext($bild, 11, 10, 5, 20, $weisser, $ttf, $_SESSION["captcha_id"]); 
	//imagestring($bild, 3, 8, 6,  $_SESSION["captcha_id"], $weisser);  // Prints the random number von the image
	ImagePNG($bild);                                                  // Output for the generated image
?>