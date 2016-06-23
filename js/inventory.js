var inventoryCanvas = document.createElement("canvas");
inventoryCanvas.id = "inventory";
var inventoryCtx = inventoryCanvas.getContext("2d");
inventoryCanvas.width = 171;
inventoryCanvas.height = 565;
inventoryCanvas.style.marginBottom = '50px';
inventoryCanvas.style.marginRight = '25px';
inventoryCanvas.style.paddingTop = '25px';
inventoryCanvas.style.background = 'url(img/.png) #444444 repeat';
inventoryCanvas.style.border = '2px solid #222222';
inventoryCanvas.style.borderRadius = '5px';
inventoryCanvas.style.textAlign = 'right';
inventoryCanvas.textBaseline = 'right';
inventoryCtx.font = '8pt Arial';
inventoryCtx.fillStyle = '#151515';
inventoryCtx.strokeStyle  = '#CCCCCC';

/* CREATE CANVAS FOR ITEMS */
var inventoryItemCanvas = document.createElement("canvas");
inventoryItemCanvas.id = "inventoryItem";
inventoryItemCanvas.width = screen_width;
inventoryItemCanvas.height = screen_height;
inventoryItemCanvas.style.background = '';
document.body.appendChild(inventoryItemCanvas);

var inventoryBuild = function(){
	var invEquip = new Image();
	var invSlots = new Image();
	
	invEquip.onload = function(){
		inventoryCtx.drawImage(invEquip, 0, 0, 171, 206);
	};
	invEquip.src = "img/inv.png";
	invSlots.onload = function(){
		inventoryCtx.rect(0, 236, 171, 309);
		inventoryCtx.fillStyle=inventoryCtx.createPattern(invSlots,"repeat");
		inventoryCtx.fill();
	};
	invSlots.src = "img/empty.png";
	
	inventoryCtx.fillStyle = '#999999';
	inventoryCtx.fillRect(0, 210, 85, 20);
	inventoryCtx.strokeText("             I            ", 0, 223, 160);
	inventoryCtx.fillStyle = '#151515';
	inventoryCtx.fillRect(85, 210, 171, 20);
	inventoryCtx.strokeText("             II           ", 85, 223, 160);
	inventoryCtx.fillStyle = '#151515';
	
	inventoryCtx.fillRect(0, 550, 171, 20);
	var txt = "0";
	while(inventoryCtx.measureText(txt).width <= 120){
		txt += " ";
	}
	txt += "Muenzen";
	inventoryCtx.strokeText(txt, 5, 562, 160);
};

var inventoryDisplay = 0, inventoryPage = 0;
var itemMove = 0, itemUse = 0;
var inventoryUpdate = function(modifier){	
	if(input.isDown('i') || (mouseX >= screen_width-120 && mouseX <= screen_width-84 && mouseY >= screen_height-navCanvasSkill.height && mouseY <= screen_height)){
		mouseX = 0;
		mouseY = 0;
		if(inventoryDisplay == 0){
			document.body.appendChild(inventoryCanvas);
			document.body.appendChild(inventoryItemCanvas);
			inventoryDisplay = 1;
		}else{
			document.body.removeChild(inventoryCanvas);
			document.body.removeChild(inventoryItemCanvas);
			inventoryDisplay = 0;
		}
	}
	
	if(inventoryDisplay == 1){
		if(mouseX >= screen_width-196 && mouseX <= screen_width-110 && mouseY >= screen_height-405 && mouseY <= screen_height-385){
			mouseX = 0;
			mouseY = 0;
			inventoryCtx.fillStyle = '#999999';
			inventoryCtx.clearRect(0, 210, 85, 20);
			inventoryCtx.fillRect(0, 210, 85, 20);
			inventoryCtx.strokeText("             I            ", 0, 223, 160);
			inventoryCtx.fillStyle = '#151515';
			inventoryCtx.clearRect(85, 210, 171, 20);
			inventoryCtx.fillRect(85, 210, 171, 20);
			inventoryCtx.strokeText("             II           ", 85, 223, 160);
			inventoryCtx.fillStyle = '#151515';
			inventoryPage = 0;
			return;
		}else if(mouseX >= screen_width-110 && mouseX <= screen_width-25 && mouseY >= screen_height-405 && mouseY <= screen_height-385){
			mouseX = 0;
			mouseY = 0;
			inventoryCtx.fillStyle = '#151515';
			inventoryCtx.clearRect(0, 210, 85, 20);
			inventoryCtx.fillRect(0, 210, 85, 20);
			inventoryCtx.strokeText("             I            ", 0, 223, 160);
			inventoryCtx.fillStyle = '#999999';
			inventoryCtx.clearRect(85, 210, 171, 20);
			inventoryCtx.fillRect(85, 210, 171, 20);
			inventoryCtx.strokeText("             II           ", 85, 223, 160);
			inventoryCtx.fillStyle = '#151515';
			inventoryPage = 1;
			return;
		}
	
		$("#items").load("game/inventory.php", function(){
			inventoryCtx.clearRect(0, 236, 171, 309);
			
			var invSlots = new Image();
			inventoryCtx.rect(0, 236, 171, 309);
			invSlots.src = "img/empty.png";
			inventoryCtx.fillStyle=inventoryCtx.createPattern(invSlots,"repeat");
			inventoryCtx.fill();
			
			var item = new Array();
			var itemImg = new Array();
			var inventoryItemCtx = new Array();
			for(i=inventoryPage*45; i<inventoryPage*45+45; i++){
				item[i] = document.getElementById("item_"+i).value;
				
				var invItemWidth = 0+(i%5*34 + i%5);
				var invItemHeight = 236+(Math.floor(i/5)*34 + Math.floor(i/5));
				if(item[i] != 0){
					itemImg[i] = new Image();
					itemImg[i].src = "img/item/"+item[i]+".png";
					
					inventoryItemCtx[i] = inventoryItemCanvas.getContext("2d");
					inventoryItemCtx[i].fillStyle = 'transparent';
					inventoryItemCtx[i].drawImage(itemImg[i], screen_width-196+invItemWidth, screen_height-615+invItemHeight);
					
					//DRAG & DROP
					if(mouseX >= screen_width-196+invItemWidth && mouseX <= screen_width-196+invItemWidth+32 && mouseY >= screen_height-615+invItemHeight && mouseY <= screen_height-615+invItemHeight+32){
						mouseX = 0;
						mouseY = 0;
						if(itemMove == i+1){
							itemMove = 0;
						}else{
							itemMove = i+1;
						}
					}
					if(itemMove == i+1){
						inventoryItemCtx[i].clearRect(0, 0, screen_width, screen_height);
						inventoryItemCtx[i].drawImage(itemImg[i], mouseXmove, mouseYmove);
						
						//move
						if(mouseX > 0 && mouseY > 0){
							inventoryItemCtx[i].clearRect(0, 0, screen_width, screen_height);
							if(mouseX >= screen_width-196 && mouseX <= screen_width-25 && mouseY >= screen_height-615 && mouseY <= screen_height-70){
								if(mouseY <= screen_height-379){
									//MOVE ITEM
									$("#update").load("game/inventory.php?update=2&item="+i+"&itemNew="+(Math.floor((mouseX-(screen_width-196))/34)+5*(Math.floor((mouseY-(screen_height-(615-236)))/34))));
									itemMove = 0;
									mouseX = 0;
									mouseY = 0;
								}else{
									//EQUIP ITEM
									if(mouseX >= screen_width-196+7 && mouseX <= screen_width-196+41 && mouseY >= screen_height-615+7 && mouseY <= screen_height-615+112){
										//WAFFE
										//->gucken ob waffe
										//->mit ajax aus spieler datenbank raus
										//->ausruesten
										//->werte anpassen
									}
									if(mouseX >= screen_width-196+47 && mouseX <= screen_width-196+81 && mouseY >= screen_height-615+5 && mouseY <= screen_height-615+39){
										//HELM
									}
									if(mouseX >= screen_width-196+47 && mouseX <= screen_width-196+81 && mouseY >= screen_height-615+46 && mouseY <= screen_height-615+114){
										//RUESTUNG
									}
									if(mouseX >= screen_width-196+47 && mouseX <= screen_width-196+81 && mouseY >= screen_height-615+163 && mouseY <= screen_height-615+197){
										//SCHUHE
									}
									if(mouseX >= screen_width-196+47 && mouseX <= screen_width-196+81 && mouseY >= screen_height-615+129 && mouseY <= screen_height-615+163){
										//BUFF LINKS
									}
									if(mouseX >= screen_width-196+88 && mouseX <= screen_width-196+122 && mouseY >= screen_height-615+42 && mouseY <= screen_height-615+78){
										//SCHILD
									}
									if(mouseX >= screen_width-196+88 && mouseX <= screen_width-196+122 && mouseY >= screen_height-615+77 && mouseY <= screen_height-615+111){
										//ARMBAND
									}
									if(mouseX >= screen_width-196+88 && mouseX <= screen_width-196+122 && mouseY >= screen_height-615+129 && mouseY <= screen_height-615+163){
										//BUFF RECHTS
									}
									if(mouseX >= screen_width-196+130 && mouseX <= screen_width-196+164 && mouseY >= screen_height-615+5 && mouseY <= screen_height-615+39){
										//PFEILE
									}
									if(mouseX >= screen_width-196+130 && mouseX <= screen_width-196+164 && mouseY >= screen_height-615+62 && mouseY <= screen_height-615+96){
										//OHRRINGE
									}
									if(mouseX >= screen_width-196+130 && mouseX <= screen_width-196+164 && mouseY >= screen_height-615+97 && mouseY <= screen_height-615+141){
										//HALSKETTE
									}
								}
							}else{
								inventoryItemCtx[i].fillStyle = '#151515';
								inventoryItemCtx[i].strokeStyle  = '#CCCCCC';
								inventoryItemCtx[i].font = 'bold 12pt Arial';
								inventoryItemCtx[i].fillRect(screen_width/2-150, screen_height/2-50, 300, 100);
								inventoryItemCtx[i].strokeText("'"+item[i]+"' wirklich fallen lassen?", screen_width/2-130, screen_height/2-30, 260, 60);
								
								inventoryItemCtx[i].fillStyle = '#CCCCCC';
								inventoryItemCtx[i].strokeStyle  = '#151515';
								inventoryItemCtx[i].fillRect(screen_width/2-65, screen_height/2, 50, 28);
								inventoryItemCtx[i].fillRect(screen_width/2+15, screen_height/2, 50, 28);
								inventoryItemCtx[i].strokeText("   Ok!", screen_width/2-65, screen_height/2+20, 50, 20);
								inventoryItemCtx[i].strokeText("  Nein", screen_width/2+15, screen_height/2+20, 50, 20);
								if(mouseX >= screen_width/2-65 && mouseX <= screen_width/2-15 && mouseY >= screen_height/2 && mouseY <= screen_height/2+28){
									//DROP ITEM
									$("#update").load("game/inventory.php?update=1&item="+i);
									//->map datenbank anpassen mit ajax (position wo das gedroppt hat)
									inventoryItemCtx[i].clearRect(0, 0, screen_width, screen_height);
									itemMove = 0;
									mouseX = 0;
									mouseY = 0;
								}
								if(mouseX >= screen_width/2+15 && mouseX <= screen_width/2+65 && mouseY >= screen_height/2 && mouseY <= screen_height/2+28){
									//RESET ITEM
									inventoryItemCtx[i].clearRect(0, 0, screen_width, screen_height);
									itemMove = 0;
									mouseX = 0;
									mouseY = 0;
								}
							}
							//drop
							//->if in inventory -> resize to grit	-> update position
							//->if in equipment -> equip it -> erase item (=0)
						}
					}
					//USE ITEM
					if(mouseXright >= screen_width-196+invItemWidth && mouseXright <= screen_width-196+invItemWidth+32 && mouseYright >= screen_height-615+invItemHeight && mouseYright <= screen_height-615+invItemHeight+32){
						mouseXright = 0;
						mouseYright = 0;
						//if item useable -> use
						itemUse = 1;
					}
				}
			}
		});
	}
};

var inventoryMain = function(){
	var inventory_tick = Date.now();
	inventoryUpdate((inventory_tick-inventory_tick_new) / 1000);
	inventory_tick_new = inventory_tick;
	requestAnimationFrame(inventoryMain);
};
var inventory_tick_new = Date.now();
inventoryBuild();
inventoryMain();