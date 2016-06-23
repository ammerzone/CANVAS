var closeCanvas = document.createElement("canvas");
var closeCtx = closeCanvas.getContext("2d");
closeCanvas.width = 175;
closeCanvas.height = 300;
closeCanvas.style.background = 'transparent';
closeCtx.font = 'bold 12pt Arial';
closeCtx.fillStyle = '#151515';
closeCtx.strokeStyle  = '#CCCCCC';
closeCanvas.style.border = '2px solid #222222';
closeCanvas.style.borderRadius = '5px';
closeCanvas.style.padding = '15px';

var closeBuild = function(){
	//option-box bauen
	closeCtx.fillRect(0, 0, 175, 25);
	closeCtx.strokeText("HILFE", 5, 15, 170);
	closeCtx.fillRect(0, 40, 175, 25);
	closeCtx.strokeText("ITEMSHOP", 5, 55, 170);
	
	closeCtx.fillRect(0, 100, 175, 25);
	closeCtx.strokeText("EINSTELLUNGEN", 5, 115, 170);
	closeCtx.fillRect(0, 140, 175, 25);
	closeCtx.strokeText("SPIELOPTIONEN", 5, 155, 170);
	closeCtx.fillRect(0, 180, 175, 25);
	closeCtx.strokeText("CHARAKTER WECHSELN", 5, 195, 170);
	closeCtx.fillRect(0, 220, 175, 25);
	closeCtx.strokeText("LOG OUT", 5, 235, 170);
	
	closeCtx.fillRect(0, 280, 175, 25);
	closeCtx.strokeText("ABBRECHEN", 5, 295, 170);
};

var closeDisplay = 0;
var closeUpdate = function(modifier){
	if(input.isDown('ESC') || (mouseX >= screen_width-40 && mouseX <= screen_width-4 && mouseY >= screen_height-navCanvasSkill.height && mouseY <= screen_height)){
		mouseX = 0;
		mouseY = 0;
		if(document.getElementById("inventory")){
			document.body.removeChild(inventoryCanvas);
			document.body.removeChild(inventoryItemCanvas);
			inventoryDisplay = 0;
		}else{
			if(closeDisplay == 0){
				document.body.appendChild(closeCanvas);
				closeDisplay = 1;
			}else{
				document.body.removeChild(closeCanvas);
				closeDisplay = 0;
			}
		}
	}
	if(closeDisplay == 1){
		if(mouseX >= screen_width/2-closeCanvas.width/2 && mouseX <= screen_width/2+closeCanvas.width/2 && mouseY >= screen_height/2-closeCanvas.height/2+0 && mouseY <= screen_height/2-closeCanvas.height/2+25){
			//HILFE
			document.body.removeChild(closeCanvas);
			closeDisplay = 0;
			mouseX = 0;
			mouseY = 0;
		}
		if(mouseX >= screen_width/2-closeCanvas.width/2 && mouseX <= screen_width/2+closeCanvas.width/2 && mouseY >= screen_height/2-closeCanvas.height/2+40 && mouseY <= screen_height/2-closeCanvas.height/2+65){
			//ITEMSHOP
			document.body.removeChild(closeCanvas);
			closeDisplay = 0;
			mouseX = 0;
			mouseY = 0;
		}
		if(mouseX >= screen_width/2-closeCanvas.width/2 && mouseX <= screen_width/2+closeCanvas.width/2 && mouseY >= screen_height/2-closeCanvas.height/2+100 && mouseY <= screen_height/2-closeCanvas.height/2+125){
			//EINSTELLUNGEN
			document.body.removeChild(closeCanvas);
			closeDisplay = 0;
			mouseX = 0;
			mouseY = 0;
		}
		if(mouseX >= screen_width/2-closeCanvas.width/2 && mouseX <= screen_width/2+closeCanvas.width/2 && mouseY >= screen_height/2-closeCanvas.height/2+140 && mouseY <= screen_height/2-closeCanvas.height/2+165){
			//SPIELOPTIONEN
			document.body.removeChild(closeCanvas);
			closeDisplay = 0;
			mouseX = 0;
			mouseY = 0;
		}
		if(mouseX >= screen_width/2-closeCanvas.width/2 && mouseX <= screen_width/2+closeCanvas.width/2 && mouseY >= screen_height/2-closeCanvas.height/2+180 && mouseY <= screen_height/2-closeCanvas.height/2+205){
			//CHARAKTER WECHSELN
			document.body.removeChild(closeCanvas);
			closeDisplay = 0;
			mouseX = 0;
			mouseY = 0;
		}
		if(mouseX >= screen_width/2-closeCanvas.width/2 && mouseX <= screen_width/2+closeCanvas.width/2 && mouseY >= screen_height/2-closeCanvas.height/2+220 && mouseY <= screen_height/2-closeCanvas.height/2+245){
			//LOG OUT
			document.body.removeChild(closeCanvas);
			closeDisplay = 0;
			mouseX = 0;
			mouseY = 0;
		}
		if(mouseX >= screen_width/2-closeCanvas.width/2 && mouseX <= screen_width/2+closeCanvas.width/2 && mouseY >= screen_height/2-closeCanvas.height/2+280 && mouseY <= screen_height/2-closeCanvas.height/2+305){
			//ABBRECHEN
			document.body.removeChild(closeCanvas);
			closeDisplay = 0;
			mouseX = 0;
			mouseY = 0;
		}
	}
};	
	
var closeMain = function(){
	var close_tick = Date.now();
	closeUpdate((close_tick-close_tick_new) / 1000);
	close_tick_new = close_tick;
	requestAnimationFrame(closeMain);
};
var close_tick_new = Date.now();
closeBuild();
closeMain();