requestAnimationFrame = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame || window.mozRequestAnimationFrame;
var gameCanvas = document.createElement("canvas");
var gameCtx = gameCanvas.getContext("2d");
var screen_width = (window.innerWidth || (window.document.documentElement.clientWidth || window.document.body.clientWidth));
var screen_height = (window.innerHeight || (window.document.documentElement.clientHeight || window.document.body.clientHeight));
gameCanvas.width = screen_width;
gameCanvas.height = screen_height;
document.body.appendChild(gameCanvas);
var startPosX = 24, startPosY = 14, speed = 100;
$("#playervalues").load("game/playervalues.php", function(){
	startPosX = document.getElementById('player_xPos').value;
	startPosY = document.getElementById('player_yPos').value;
	speed =  document.getElementById("player_speed").value;
});

var map = {}
var character = {speed: speed};
var monster = {};

var gameUpdate = function(modifier){
	//KOORDINATEN UND POSITION NEU DEFINIEREN
	if(map.y < -256){		map.y += 512;	yPos--;	}
	if(map.y > 256){		map.y -= 512;	yPos++;	}
	if(map.x < -256){		map.x += 512;	xPos--;	}
	if(map.x > 256){		map.x -= 512;	xPos++;	}
	
	//RUN
	if(input.isDown('UP') || input.isDown('w')){
		var tmp=new Image;
		var verschiebung = Math.round(yPos - (map.y + (character.speed * modifier)) / 512);
		tmp.src = "img/map/["+xPos+"]["+((map.y>=0)?(yPos):(verschiebung))+"].png"; 
		if(tmp.complete){	map.y -= (character.speed * modifier); }
	}
	if(input.isDown('LEFT') || input.isDown('a')){
		var tmp=new Image;
		var verschiebung = Math.round(xPos - (map.x + (character.speed * modifier)) / 512);
		tmp.src = "img/map/["+((map.x>=0)?(xPos):(verschiebung))+"]["+yPos+"].png"; 
		if(tmp.complete){	map.x -= character.speed * modifier; }
	}
	if(input.isDown('DOWN') || input.isDown('s')){
		var tmp=new Image;
		var verschiebung = Math.floor(yPos + (map.y + (character.speed * modifier)) / 256);
		tmp.src = "img/map/["+xPos+"]["+((map.y>=0)?(verschiebung):(yPos))+"].png"; 
		if(tmp.complete){	map.y += character.speed * modifier; }
	}
	if(input.isDown('RIGHT') || input.isDown('d')){
		var tmp=new Image;
		var verschiebung = Math.floor(xPos + (map.x + (character.speed * modifier)) / 256);
		tmp.src = "img/map/["+((map.x>=0)?(verschiebung):(xPos))+"]["+yPos+"].png";
		if(tmp.complete){	map.x += character.speed * modifier; }
	}
	
	//ACTIONS
	if(input.isDown('SPACE')){	//HIT
		//gucken ob mob gekillt oder schaden gemacht -> php mit ajax laden
			//-> Drop laden und , wenn lvlup dannanimation machen
		//gucken ob skillpunkte vorhande sind -> php mit ajax laden
		//aktuelles leben und mp und ausdauer laden
			//->wenn 0 dann tod
		//gucken ob nachricht bekommen -> -""-
		//handel
		//flüstern
		//chat
		//laden öffnen/ansprechen
		//angeln
		//erze abbauen
		//reittier aufsteigen / absteigen
		//pvp
		//portal
	}
	
	$("#playervalues").load("game/playervalues_safe.php?x="+xPos+"&y="+yPos+"&exp=&speed=&TP=&MP=&endurance=&vit=&int=&str=&dex=");
};


//character//
var characterReady = false;
var characterImage = new Image();
characterImage.onload = function(){ characterReady = true; };
characterImage.src = "img/hero.png";
var gameRender = function(){
	gameCtx.clearRect(0, 0, screen_width, screen_height);
	//Map laden
	var x=0, y=0;
	var mapImage = new Array();
	for(i = (xPos>=2)?(xPos-2):(0); i <= xPos+2; i++){
		x=0;
		mapImage[i] = new Array();
		for(j = (yPos>=2)?(yPos-2):(0); j <= yPos+2; j++){
			mapImage[i][j] = new Image();
			mapImage[i][j].src = "img/map/["+i+"]["+j+"].png";
			gameCtx.drawImage(mapImage[i][j], 0, 0, 512, 512, -map.x+((i-xPos)*512+(screen_width / 2)-256), -map.y+((j-yPos)*512+(screen_height / 2)-256), 512, 512);
			x++;
		}
		y++;
	}
	if(characterReady)		gameCtx.drawImage(characterImage, character.x, character.y);
	//Monster laden
	$("#mapvalues").load("game/mapvalues.php");
};

var gameReset = function(){
	xPos = startPosX;
	yPos = startPosY;
	map.x = 0;
	map.y = 0;
	character.x = (screen_width / 2)-16;
	character.y = (screen_height / 2)-16;
};

var gameMain = function(){
	var tick = Date.now();
	gameUpdate((tick-tick_new) / 1000);
	$("#playervalues").load("game/playervalues.php");
	gameRender();
	tick_new = tick;
	requestAnimationFrame(gameMain);
};
var tick_new = Date.now();
gameReset();
gameMain();