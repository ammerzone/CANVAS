<div id="charValues">
	<input type="hidden" id="char_empire" value="">
	<input type="hidden" id="char_guild" value="keine Gilde">
	<input type="hidden" id="char_name" value="">
	<input type="hidden" id="char_level" value="">
	<input type="hidden" id="char_time" value="0">
	<input type="hidden" id="char_vit" value="0">
	<input type="hidden" id="char_int" value="0">
	<input type="hidden" id="char_str" value="0">
	<input type="hidden" id="char_dex" value="0">
</div>
<script type="text/javascript">
	//$('#charValues').load("game/charData.php?c=1");
	var characterCanvas = document.createElement("canvas");
	var screen_width = (window.innerWidth || (window.document.documentElement.clientWidth || window.document.body.clientWidth));
	var screen_height = (window.innerHeight || (window.document.documentElement.clientHeight || window.document.body.clientHeight));
	characterCanvas.width = screen_width;
	characterCanvas.height = screen_height;
	characterCanvas.style.background = 'transparent';
	characterCanvas.style.border = '2px solid #222222';
	characterCanvas.style.borderRadius = '5px';
	characterCanvas.style.padding = '15px';
	document.body.appendChild(characterCanvas);
	
	var characterCtx = characterCanvas.getContext("2d");
	characterCtx.font = 'bold 12pt Arial';
	characterCtx.fillStyle = '#CCCCCC';
	characterCtx.strokeStyle  = '#CCCCCC';
	
	var characterBuild = function(){
		characterCtx.strokeRect(25, screen_height-500, 325, 475);
		
		characterCtx.fillStyle = '#151515';
		characterCtx.fillRect(175, screen_height-475, 150, 25);
		characterCtx.fillRect(175, screen_height-440, 150, 25);
		characterCtx.fillRect(125, screen_height-395, 200, 25);
		characterCtx.fillRect(125, screen_height-355, 200, 25);
		characterCtx.fillRect(125, screen_height-315, 200, 25);
		characterCtx.fillRect(295, screen_height-255, 35, 20);
		characterCtx.fillRect(295, screen_height-225, 35, 20);
		characterCtx.fillRect(295, screen_height-195, 35, 20);
		characterCtx.fillRect(295, screen_height-165, 35, 20);
		characterCtx.fillStyle  = '#CCCCCC';
		
		characterCtx.strokeRect(50, screen_height-475, 100, 60);
		characterCtx.strokeRect(175, screen_height-475, 150, 25);
		characterCtx.strokeRect(175, screen_height-440, 150, 25);
		
		characterCtx.fillText("Name", 50, screen_height-380);
		characterCtx.strokeRect(125, screen_height-395, 200, 25);
		characterCtx.fillText("Level", 50, screen_height-340);
		characterCtx.strokeRect(125, screen_height-355, 200, 25);
		characterCtx.fillText("Spielzeit", 50, screen_height-300);
		characterCtx.strokeRect(125, screen_height-315, 200, 25);
		
		characterCtx.fillText("VIT", 50, screen_height-240);
		characterCtx.strokeRect(125, screen_height-255, 150, 20);
		characterCtx.strokeRect(295, screen_height-255, 35, 20);
		characterCtx.fillText("INT", 50, screen_height-210);
		characterCtx.strokeRect(125, screen_height-225, 150, 20);
		characterCtx.strokeRect(295, screen_height-225, 35, 20);
		characterCtx.fillText("STR", 50, screen_height-180);
		characterCtx.strokeRect(125, screen_height-195, 150, 20);
		characterCtx.strokeRect(295, screen_height-195, 35, 20);
		characterCtx.fillText("DEX", 50, screen_height-150);
		characterCtx.strokeRect(125, screen_height-165, 150, 20);
		characterCtx.strokeRect(295, screen_height-165, 35, 20);
		
		
		characterCtx.fillRect(50, screen_height-120, 275, 35);
		characterCtx.fillRect(50, screen_height-70, 125, 25);
		characterCtx.fillRect(200, screen_height-70, 125, 25);
		characterCtx.fillStyle = '#151515';
		characterCtx.fillText("Start", 165, screen_height-95);
		characterCtx.fillText("Löschen", 75, screen_height-50);
		characterCtx.fillText("Beenden", 225, screen_height-50);
		characterCtx.fillStyle  = '#CCCCCC';
		
		characterCtx.fillStyle  = 'red';
		characterCtx.fillRect(125, screen_height-255, (25/100)*150, 20);
		characterCtx.fillStyle  = 'violet';
		characterCtx.fillRect(125, screen_height-225, (25/100)*150, 20);
		characterCtx.fillStyle  = 'purple';
		characterCtx.fillRect(125, screen_height-195, (25/100)*150, 20);
		characterCtx.fillStyle  = 'cyan';
		characterCtx.fillRect(125, screen_height-165, (25/100)*150, 20);
		characterCtx.fillStyle  = '#CCCCCC';
		
		characterCtx.fillText(document.getElementById("char_empire").value, 180, screen_height-455);
		characterCtx.fillText(document.getElementById("char_guild").value, 180, screen_height-420);
		characterCtx.fillText(document.getElementById("char_name").value, 130, screen_height-375);
		characterCtx.fillText(document.getElementById("char_level").value, 130, screen_height-335);
		characterCtx.fillText(document.getElementById("char_time").value+" min.", 130, screen_height-295);
		
		characterCtx.fillText(document.getElementById("char_vit").value, 300, screen_height-238);
		characterCtx.fillText(document.getElementById("char_int").value, 300, screen_height-208);
		characterCtx.fillText(document.getElementById("char_str").value, 300, screen_height-178);
		characterCtx.fillText(document.getElementById("char_dex").value, 300, screen_height-148);
		
		
		characterCtx.strokeRect(375, 25, screen_width-425, screen_height-100);
		
		characterCtx.strokeRect(((screen_width+350)/2)-200, screen_height-50, 175, 35);
		characterCtx.strokeRect(((screen_width+350)/2)+25, screen_height-50, 175, 35);
		characterCtx.fillText("<-   LINKS", ((screen_width+350)/2)-200+45, screen_height-25);
		characterCtx.fillText("RECHTS   ->", ((screen_width+350)/2)+25+45, screen_height-25);
	};
	
	var cNum = 1;
	
	var characterUpdate = function(modifier){	
		var change = 0;
		if(input.isDown('LEFT')){
			//(mouseX >= ((screen_width+350)/2)-200 && mouseX <= ((screen_width+350)/2)-25 && mouseY >= screen_height-50 && mouseY <= screen_height-15)){
			//cNum--;
			//if(cNum <= 0)	cNum = 4;
			//change = 1;
		}
		if(input.isDown('RIGHT')){
			//(mouseX >= ((screen_width+350)/2)+25 && mouseX <= ((screen_width+350)/2)+200 && mouseY >= screen_height-50 && mouseY <= screen_height-15)){
			//cNum++;
			//if(cNum >= 5)	cNum = 1;
			change = 1;
		}	
		if(change == 1){
			characterCtx.fillStyle  = 'red';
			characterCtx.fillRect(125, screen_height-255, (25/100)*150, 20);
			characterCtx.fillStyle  = 'violet';
			characterCtx.fillRect(125, screen_height-225, (25/100)*150, 20);
			characterCtx.fillStyle  = 'purple';
			characterCtx.fillRect(125, screen_height-195, (25/100)*150, 20);
			characterCtx.fillStyle  = 'cyan';
			characterCtx.fillRect(125, screen_height-165, (25/100)*150, 20);
			characterCtx.fillStyle  = '#CCCCCC';
			
			characterCtx.fillText(document.getElementById("char_empire").value, 180, screen_height-455);
			characterCtx.fillText(document.getElementById("char_guild").value, 180, screen_height-420);
			characterCtx.fillText(document.getElementById("char_name").value, 130, screen_height-375);
			characterCtx.fillText(document.getElementById("char_level").value, 130, screen_height-335);
			characterCtx.fillText(document.getElementById("char_time").value+" min.", 130, screen_height-295);
			
			characterCtx.fillText(document.getElementById("char_vit").value, 300, screen_height-238);
			characterCtx.fillText(document.getElementById("char_int").value, 300, screen_height-208);
			characterCtx.fillText(document.getElementById("char_str").value, 300, screen_height-178);
			characterCtx.fillText(document.getElementById("char_dex").value, 300, screen_height-148);
			change = 0;
		}
	}
	var characterMain = function(){
		var character_tick = Date.now();
		$('#charValues').load("game/charData.php?c="+cNum);
		characterUpdate((character_tick-character_tick_new) / 1000);
		character_tick_new = character_tick;
		requestAnimationFrame(characterMain);
	};
	var character_tick_new = Date.now();
	characterBuild();
	characterMain();
</script>

<?php

?>