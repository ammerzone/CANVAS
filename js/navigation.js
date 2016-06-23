var navCanvasSkill = document.createElement("canvas");
var navCtxSkill = navCanvasSkill.getContext("2d");
navCanvasSkill.width = (window.innerWidth || (window.document.documentElement.clientWidth || window.document.body.clientWidth));
navCanvasSkill.height = 36;
navCanvasSkill.style.marginBottom = '0px';
navCanvasSkill.style.paddingTop = '2px';
navCanvasSkill.style.background = 'url(img/navBackground.png) #888888 repeat';

navCtxSkill.font = 'bold 8pt Arial';
navCtxSkill.fillStyle = '#FEFEFE';
document.body.appendChild(navCanvasSkill);

var navSkillUpdate = function(modifier){
	if(input.isDown('1')){
		if(document.getElementById("skill1_id").value != undefined){
			document.getElementById("skill1_id").value;
			document.getElementById("skill1_level").value;
		}
		//cooldownzeit beginnen
	}
	if(input.isDown('2')){
		//gucken was sich auf dieser Position befindet -> Cooldownzeit auslesen
		//cooldownzeit beginnen
	}
	if(input.isDown('3')){
		//gucken was sich auf dieser Position befindet -> Cooldownzeit auslesen
		//cooldownzeit beginnen
	}
	if(input.isDown('4')){
		//gucken was sich auf dieser Position befindet -> Cooldownzeit auslesen
		//cooldownzeit beginnen
	}
	if(input.isDown('5')){
		//gucken was sich auf dieser Position befindet -> Cooldownzeit auslesen
		//cooldownzeit beginnen
	}
	if(input.isDown('6')){
		//gucken was sich auf dieser Position befindet -> Cooldownzeit auslesen
		//cooldownzeit beginnen
	}
	if(input.isDown('7')){
		//gucken was sich auf dieser Position befindet -> Cooldownzeit auslesen
		//cooldownzeit beginnen
	}
	if(input.isDown('8')){
		//gucken was sich auf dieser Position befindet -> Cooldownzeit auslesen
		//cooldownzeit beginnen
	}
}

var navSkillRender = function(){
	var center = (window.innerWidth || (window.document.documentElement.clientWidth || window.document.body.clientWidth)) / 2;
	expImg = new Image();
	expImg.src = "img/expBubble.png";
	//wert 2 (startY) und wert 6 (versetzungY) anpassen
	var expPercent = Math.round(((document.getElementById("player_exp").value*100)/document.getElementById("player_expNeed").value) * 100) / 100;
	if(expPercent > 75){
		navCtxSkill.drawImage(expImg, 0, 0, 19, 19, 206, 7, 19, 19); //EXP-BLASE 1
		navCtxSkill.drawImage(expImg, 0, 0, 19, 19, 232.5, 7, 19, 19); //EXP-BLASE 2
		navCtxSkill.drawImage(expImg, 0, 0, 19, 19, 259, 7, 19, 19); //EXP-BLASE 3
		navCtxSkill.drawImage(expImg, 0, 25-expPercent%25, 19, 19, 286, 7+(25-expPercent%25), 19, 19); //EXP-BLASE 4
		expPercent -= 25;
	}else if(expPercent > 50){
		navCtxSkill.drawImage(expImg, 0, 0, 19, 19, 206, 7, 19, 19); //EXP-BLASE 1
		navCtxSkill.drawImage(expImg, 0, 0, 19, 19, 232.5, 7, 19, 19); //EXP-BLASE 2
		navCtxSkill.drawImage(expImg, 0, 25-expPercent%25, 19, 19, 259, 7+(25-expPercent%25), 19, 19); //EXP-BLASE 3
		expPercent -= 25;
	}else if(expPercent > 25){
		navCtxSkill.drawImage(expImg, 0, 0, 19, 19, 206, 7, 19, 19); //EXP-BLASE 1
		navCtxSkill.drawImage(expImg, 0, 25-expPercent%25, 19, 19, 232.5, 7+(25-expPercent%25), 19, 19); //EXP-BLASE 2
		expPercent -= 25;
	}else{
		navCtxSkill.drawImage(expImg, 0, 25-expPercent%25, 19, 19, 206, 7+(25-expPercent%25), 19, 19); //EXP-BLASE 1
	}
	
	navCtxSkill.fill();
	
	//gucken ob inventar was passiert ist -> php mit ajax laden
	//gucken ob itemshop offen -> -""-
	//gucken ob optionen gewählt wurden -> -""-
	
};

var navSkillBuild = function(){
	var center = (window.innerWidth || (window.document.documentElement.clientWidth || window.document.body.clientWidth)) / 2;
	
	navCtxSkill.fillText('ITEM SHOP', 10, 10);
	
	var lifeImage = new Image();
	var expImage = new Image();
	lifeImage.onload = function(){ navCtxSkill.drawImage(lifeImage, 90, 0); };
	expImage.onload = function(){ navCtxSkill.drawImage(expImage, 200, 0); };
	lifeImage.src = "img/life.png";
	expImage.src = "img/exp.png";
	
	var s1Image = new Image();
	var s2Image = new Image();
	var s3Image = new Image();
	var s4Image = new Image();
	var s5Image = new Image();
	var s6Image = new Image();
	var s7Image = new Image();
	var s8Image = new Image();
	s1Image.onload = function(){ navCtxSkill.drawImage(s1Image, center-160, 0); navCtxSkill.fillText('  1', center-160, 10); };
	s2Image.onload = function(){ navCtxSkill.drawImage(s2Image, center-120, 0); navCtxSkill.fillText('  2', center-120, 10); };
	s3Image.onload = function(){ navCtxSkill.drawImage(s3Image, center-80, 0); navCtxSkill.fillText('  3', center-80, 10); };
	s4Image.onload = function(){ navCtxSkill.drawImage(s4Image, center-40, 0); navCtxSkill.fillText('  4', center-40, 10); };
	s5Image.onload = function(){ navCtxSkill.drawImage(s5Image, center+40, 0); navCtxSkill.fillText('  5', center+40, 10);};
	s6Image.onload = function(){ navCtxSkill.drawImage(s6Image, center+80, 0); navCtxSkill.fillText('  6', center+80, 10);};
	s7Image.onload = function(){ navCtxSkill.drawImage(s7Image, center+120, 0); navCtxSkill.fillText('  7', center+120, 10);};
	s8Image.onload = function(){ navCtxSkill.drawImage(s8Image, center+160, 0); navCtxSkill.fillText('  8', center+160, 10);};
	if(document.getElementById("skill1_id").value == 0){	s1Image.src = "img/empty.png"; 
	}else{													s1Image.src = "img/skills/"+document.getElementById("skill1_id").value+".png"; }
	if(document.getElementById("skill2_id").value == 0){	s2Image.src = "img/empty.png"; 
	}else{													s2Image.src = "img/skills/"+document.getElementById("skill2_id").value+".png"; }
	if(document.getElementById("skill3_id").value == 0){	s3Image.src = "img/empty.png"; 
	}else{													s3Image.src = "img/skills/"+document.getElementById("skill3_id").value+".png"; }
	if(document.getElementById("skill4_id").value == 0){	s4Image.src = "img/empty.png"; 
	}else{													s4Image.src = "img/skills/"+document.getElementById("skill4_id").value+".png"; }
	if(document.getElementById("skill5_id").value == 0){	s5Image.src = "img/empty.png"; 
	}else{													s5Image.src = "img/skills/"+document.getElementById("skill5_id").value+".png"; }
	if(document.getElementById("skill6_id").value == 0){	s6Image.src = "img/empty.png"; 
	}else{													s6Image.src = "img/skills/"+document.getElementById("skill6_id").value+".png"; }
	if(document.getElementById("skill7_id").value == 0){	s7Image.src = "img/empty.png"; 
	}else{													s7Image.src = "img/skills/"+document.getElementById("skill7_id").value+".png"; }
	if(document.getElementById("skill8_id").value == 0){	s8Image.src = "img/empty.png"; 
	}else{													s8Image.src = "img/skills/"+document.getElementById("skill8_id").value+".png"; }
	
	var o1Image = new Image();
	var o2Image = new Image();
	var o3Image = new Image();
	var o4Image = new Image();
	o1Image.onload = function(){ navCtxSkill.drawImage(o1Image, (window.innerWidth || (window.document.documentElement.clientWidth || window.document.body.clientWidth))-160, 0); };
	o2Image.onload = function(){ navCtxSkill.drawImage(o2Image, (window.innerWidth || (window.document.documentElement.clientWidth || window.document.body.clientWidth))-120, 0); };
	o3Image.onload = function(){ navCtxSkill.drawImage(o3Image, (window.innerWidth || (window.document.documentElement.clientWidth || window.document.body.clientWidth))-80, 0); };
	o4Image.onload = function(){ navCtxSkill.drawImage(o4Image, (window.innerWidth || (window.document.documentElement.clientWidth || window.document.body.clientWidth))-40, 0); };
	o1Image.src = "img/char.png";
	o2Image.src = "img/inventory.png";
	o3Image.src = "img/friends.png";
	o4Image.src = "img/options.png";
};

var navSkillMain = function(){
	var nav_tick = Date.now();
	navSkillUpdate((nav_tick-nav_tick_new) / 1000);
	$("#playervalues").load("game/playervalues.php");
	navSkillRender();
	nav_tick_new = nav_tick;
	requestAnimationFrame(navSkillMain);
};
var nav_tick_new = Date.now();
$("#playervalues").load("game/playervalues.php");
navSkillBuild();
navSkillMain();