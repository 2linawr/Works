<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
function lt()
{
var div=document.getElementById("t");
div.insertAdjacentText("BeforeEnd", "Для получения информации об использовании помощника отправьте цифру 1\n");
div.insertAdjacentText("BeforeEnd", "Мы можем ответить на следующие вопросы:\n");
$.ajax({ type : 'POST',url: '5.php',dataType:"json",success: function(V){
	for(var i=0;i<V.length;i++){
		number=i+1;
		div.insertAdjacentText("BeforeEnd", number+")"+V[i] + "\n");
		
	}
div.insertAdjacentText("BeforeEnd", "Если хотите задать свой вопрос отправьте слово хочу.\n");
	}
})
}
function bla(){
var tr=$('#text1').val();
var dv=document.getElementById("text1");
var div=document.getElementById("t");
    $.ajax({type : 'POST',url: '2.php',dataType:"json",success: function(F) { 
		$.ajax({ type : 'POST',url: '3.php',dataType:"json",success: function(D) {
		$.ajax({ type : 'POST',url: '5.php',dataType:"json",success: function(V){
		$.ajax({ type : 'POST',url: '6.php',dataType:"json",success: function(O){
		$.ajax({ type : 'POST',url: '7.php',dataType:"json",success: function(N){
		$.ajax({ type : 'POST',url: '8.php',dataType:"json",success: function(OT){
		
					var br=tr.split(',')					
				 for (var i=0;i<=F.length;i++)
				 {
					y=i+1
					x=i+2
					z=i+3
					 if(br[i].toUpperCase()==F[i].toUpperCase() && br[y].toUpperCase()== N[i].toUpperCase() && br[x].toUpperCase()==OT[i].toUpperCase() && br[z].toUpperCase()==D[i].toUpperCase())
					 {
					 $('#text1').val("")
					 div.insertAdjacentText("BeforeEnd", "Пользователь:"+tr+"\n");
						
						 div.insertAdjacentText("BeforeEnd", "Помощник:Поступил\n");
					 }
					 else if(dv.value =="Admin"|| dv.value=="admin"|| dv.value=="Админ"|| dv.value=="админ")
					 {
					 $("#text1").val("");
						document.location.replace("Admin.php");
					 
					 }
					 
					 else if(dv.value =="Хочу" ||  dv.value =="хочу")
					 {
					 $("#text1").val("");
					 document.location.replace("Vopros.php");
					 }
					
				 for(var i=0;i<V.length;i++){
					if(tr.toUpperCase()==V[i].toUpperCase())
					 {
					 $('#text1').val("")
						div.insertAdjacentText("BeforeEnd", "Пользователь:"+tr+"\n");
						div.insertAdjacentText("BeforeEnd", "Помощник:"+O[i]+"\n");
					 }
					} 
				 }

		}
		})
		}
		})
		}
		})
		}
		})
			}
		})
		}
		})

		if(dv.value=="1")
					 {

						$('#text1').val("")
						
						alert("1) Помощник отвечает только та не вопросы которые вы видите в списке.\n 2)Убедительная просьба задавать вопросы без ошибок и так как написанно помощником иначе помощник не сможет вам ответить.\n");
					 }
		
		}



		
		</script>
		</head>
		<body style="padding:0;" onload="lt()">
	<div id="chat" style="background:#42aaff;">
		<div id="onestr">
			<div id="foto" style="border-radius: 20px;">
				<img src="men.jpg" style="border-radius:30px" width="50px" height="50px">
			</div>
			<div id="name" >
				<font style="color:white;margin-top:-40px; "><b>Ибрагимов Линар</b></font>
			</div>
			<div id="pom">
			<font style="color:white;margin-top:-40px; "><b>Оффлайн бот</b></font>			
			</div>
			</div>
		<div id="admin">
			<textarea id="t"style="font-size:15px;border-radius:10px;" readonly></textarea>
			<textarea id="text1" style="border-radius:10px;" ></textarea>
			<input type="button" value="Отправить" id="button" onclick="bla()" >
		</div>
	</div>

	</body>
</html>