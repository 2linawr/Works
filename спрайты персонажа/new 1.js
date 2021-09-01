//при загрузке окна запускается функция инициализации.
window.onload=init;
var ch=0;

//начало объявление переменных.
var earth;
var ctxearth;

var i;
var r;

var enemyCv;
var ctxenemy;

var map;
var ctxmap;

var pl;
var ctxpl;

var gameWidth=800;
var gameHeight=500;

var background=new Image();
background.src="bg.png";

var tiles= new Image();
tiles.src="самолет.png"

var Er=new Image();
Er.src="earth.png";

var ts=[];

var player;

var isPlaying;

var timer;
var ctxtimer;

var ti;
var req=window.requestAnimationFrame||window.webkitrequestAnimationFrame||window.mozrequestAnimationFrame||window.orequestAnimationFrame||window.msrequestAnimationFrame;


//функция  инициализации переменных и т.д.
function init()

{
	earth=document.getElementById("earth");
	ctxearth=earth.getContext("2d");
		
	
	timer=document.getElementById("timer");
	ctxtimer=timer.getContext("2d");
	
	map=document.getElementById("map");
	ctxmap= map.getContext("2d");

	enemyCv=document.getElementById("earth");
	ctxenemy=enemyCv.getContext("2d")
	
		pl=document.getElementById("player");
		ctxpl=pl.getContext("2d");
	
		timer.width=gameWidth;
		timer.height=gameHeight;

	
		map.width=gameWidth;
		map.height=gameHeight;
		
		pl.width=gameWidth;
		pl.height=gameHeight;
	
		earth.width=gameWidth;
		earth.height=gameHeight;
	
		/*drawBtn=document.getElementById("drawBtn");
		clearBtn=document.getElementById("clearBtn");*/

	//	ti=new Timer();
		
		player= new Player();
		drawBg();
		startloop();
		//ti.update();
		//drawTimer();	
		spawnT(7);
		document.addEventListener("keydown",checkKeyDown,false);//когда нажимается клавиша.
		document.addEventListener("keyup",checkKeyUp,false);//когда отпускается клавиша.
		
		}

		function draw()
		{
		player.draw();	
		clearCTXEnemy();
		
		for(var i=0;i<ts.length;i++)
		{
			ts[i].draw();		
		}
			
		}
		
		//начало игрового процесса.
		function loop()
		{
			if(isPlaying)
			{
				
				draw();
				update();
				req(loop);
				ch+=10;
			}
			if(!isPlaying)
			{	
				alert(ch);
			}
			
		}
		
		function startloop()
		{
			isPlaying=true;
			loop();
			
		}
		
		function stoploop()
		{
			isPlaying=false;
			//конец игрового процесса.		
		}
			//функция обновления игрового процесса.
		
		function update()
		{
					player.update();
		
				for(var i=0;i<ts.length;i++)
		{
			
			ts[i].update();
			if ((player.drawX + (player.width -60) >= ts[i].drawX) && (player.drawY + (player.height-40) >= ts[i].drawY) && (player.drawX <= ts[i].drawX + ts[i].width) && (player.drawY <= ts[i].drawY + ts[i].height) || (player.drawX <= ts[i].drawX + ts[i].width) && (player.drawY <= ts[i].drawY + ts[i].height) && (player.drawX + (player.width -60) >= ts[i].drawX) && (player.drawY + (player.height-40) >= ts[i].drawY)) isPlaying=false;;
  
		}
	}

		function spawnT(count)
		{
			for(var i=0;i<count;i++)
			{
				ts[i]=new EART();
			}
		}

		//класс игрок
function Player()
{
	this.srcX=0;
	this.srcY=0;
	this.drawX=10;
	this.drawY=250;
	this.width=150;
	this.height=125;
	this.widthbrow=100;
	this.heightbrow=50;
	
	
	this.isUp=false;
	this.isDown=false;
	this.isLeft=false;
	this.isRith=false;
	
	this.speed=8;
	
}

//класс земля
function EART()
{
	this.srcX=14;
	this.srcY=114;
	this.drawX=Math.floor(Math.random()*gameWidth)+gameWidth;
	this.drawY=Math.floor(Math.random()* gameHeight);
	this.widthbrow=107;
	this.heightbrow=60;
	this.width=100;
	this.height=50;
	
	this.speed=8;
	
}
//прототип земли
EART.prototype.draw=function()
{
	ctxenemy.drawImage(Er,this.srcX,this.srcY,this.widthbrow,this.heightbrow,this.drawX,this.drawY-20,this.width,this.height);
}

EART.prototype.update=function()
{
	if(this.drawX!=0){
	this.drawX-=5;
	if(this.drawX==0)
	{
		
	this.drawX=gameWidth;
	this.drawY=Math.floor(Math.random()* gameHeight);	
		
	}
	}
}

//прототип передвижение игрока
Player.prototype.chooseDir=function()
{
	if(this.isUp)
	{
		this.drawY-=this.speed;
		
	}
	if(this.isDown)
	{
		this.drawY+=this.speed;
	}
	if(this.isLeft)
	{
		this.drawX-=this.speed;
	}
	if(this.isRith)
	{
		this.drawX+=this.speed;
	}

	
}
//начальная прорисовка персонажа.
Player.prototype.draw=function ()
{
	clearCTXPlayer();
	ctxpl.drawImage(tiles,this.srcX,this.srcY,this.width,this.height,this.drawX,this.drawY,this.widthbrow,this.heightbrow);
	
}



//прототип обновление персонажа.
Player.prototype.update=function()
{
	player.chooseDir();
	if(this.drawX<0)this.drawX=0;
	if(this.drawX>700)this.drawX=700;
	if(this.drawY<0)this.drawY=0;
	if(this.drawY>450)this.drawY=450;


}

//очистка канваса персонажа
function clearCTXPlayer()
{
	
	ctxpl.clearRect(0,0,gameWidth,gameHeight);
}

function clearCTXEnemy()
{
	
	ctxenemy.clearRect(0,0,gameWidth,gameHeight);
}

//Функция для передвижения персонажа.
function checkKeyDown(e)
{
var KeyId=e.KeyCode || e.which;
var Keychar=String.fromCharCode(KeyId);

if(Keychar=="W"){
	player.isUp=true;
	e.preventDefault();
}
if(Keychar=="S"){
	
	player.isDown=true;
	e.preventDefault();
}
if(Keychar=="D"){
	
	player.isRith=true;
	e.preventDefault();
}
if(Keychar=="A"){
	player.isLeft=true;
	e.preventDefault();
}
}

//Функция для остановки персонажа.
function checkKeyUp(e)
{
var KeyId=e.KeyCode || e.which;
var Keychar=String.fromCharCode(KeyId);

if(Keychar=="W"){
	
	player.isUp=false;
	e.preventDefault();
}
if(Keychar=="S"){
	
	player.isDown=false;
	e.preventDefault();
}
if(Keychar=="D"){
	//player.anime();
	player.isRith=false;
	e.preventDefault();
}
if(Keychar=="A"){	
	player.isLeft=false;
	e.preventDefault();
}	
}


//рисовка бэкграунда.
function drawBg()
{
	ctxmap.drawImage(background,0,0,1000,1000,0,0,900,652);
	}

	function Timer()
	{
		i=10;
		r=0;
	}
	/*Timer.prototype.update=function()
	{
		          
        var idInt = setInterval(function() {
            if (i == 0 && r!=0) {
                r-=1;
				i=60;
            }
			if(r==0 && i==0)
			{
				clearTimeout(idInt);
				isPlaying=false;
				clearCTXEnemy()
				
			}
			if(!isPlaying)
			{
				clearInterval(idInt);
			}
			ctxtimer.clearRect(0,0,1000,1000);
			ctxtimer.font = "48px serif";
			ctxtimer.fillText(r+':'+i, 10, 100);
			i = i - 1;
		}, 1000);
	}*/
	function bla()
	{
			isPlaying=false;
	}
	function bla21()
	{
			isPlaying=true;
	}
	