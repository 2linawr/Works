<html>
<head>
<meta charset="utf-8">
<title>Обновление таблицы студенты</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
var i=0;
window.onload=init;

function init()
{
	var text1= document.getElementById('Id');
	var text2= document.getElementById('F');
	var text3= document.getElementById('N');
	var text4= document.getElementById('O');
	var text5= document.getElementById('D');
	var text6= document.getElementById('S');
	$.ajax({ type : 'POST',url: '13.php',dataType:"json",success: function(ID)
	{
	$.ajax({ type : 'POST',url: '2.php',dataType:"json",success: function(F)
	{
	$.ajax({ type : 'POST',url: '7.php',dataType:"json",success: function(N)
	{
		$.ajax({ type : 'POST',url: '8.php',dataType:"json",success: function(O)
	{
		$.ajax({ type : 'POST',url: '3.php',dataType:"json",success: function(D)
	{
		$.ajax({ type : 'POST',url: '10.php',dataType:"json",success: function(S)
	{

			text6.value=S[0];
			text5.value=D[0];
			text4.value=O[0];
			text3.value=N[0];
			text2.value=F[0];
			text1.value=ID[0];
			
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
}

function clickback()
{
	var text1= document.getElementById('Id');
	var text2= document.getElementById('F');
	var text3= document.getElementById('N');
	var text4= document.getElementById('O');
	var text5= document.getElementById('D');
	var text6= document.getElementById('S');
	$.ajax({ type : 'POST',url: '13.php',dataType:"json",success: function(ID)
	{
	$.ajax({ type : 'POST',url: '2.php',dataType:"json",success: function(F)
	{
	$.ajax({ type : 'POST',url: '7.php',dataType:"json",success: function(N)
	{
		$.ajax({ type : 'POST',url: '8.php',dataType:"json",success: function(O)
	{
		$.ajax({ type : 'POST',url: '3.php',dataType:"json",success: function(D)
	{
		$.ajax({ type : 'POST',url: '10.php',dataType:"json",success: function(S)
	{
		
	if(i>=1){
			i-=1;
			
			text6.value=S[i];
			text5.value=D[i];
			text4.value=O[i];
			text3.value=N[i];
			text2.value=F[i];
			text1.value=ID[i];
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
}
		
	function clicknext()
	{
	var text1= document.getElementById('Id');
	var text2= document.getElementById('F');
	var text3= document.getElementById('N');
	var text4= document.getElementById('O');
	var text5= document.getElementById('D');
	var text6= document.getElementById('S');
	$.ajax({ type : 'POST',url: '13.php',dataType:"json",success: function(ID)
	{
	$.ajax({ type : 'POST',url: '2.php',dataType:"json",success: function(F)
	{
	$.ajax({ type : 'POST',url: '7.php',dataType:"json",success: function(N)
	{
		$.ajax({ type : 'POST',url: '8.php',dataType:"json",success: function(O)
	{
		$.ajax({ type : 'POST',url: '3.php',dataType:"json",success: function(D)
	{
		$.ajax({ type : 'POST',url: '10.php',dataType:"json",success: function(S)
	{
		
	if(i<=ID[i]){
			i+=1;
			
			text6.value=S[i];
			text5.value=D[i];
			text4.value=O[i];
			text3.value=N[i];
			text2.value=F[i];
			text1.value=ID[i];
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
	}
	function bla()
{
	document.location.replace("buttons.php");
	
}
</script></head>
<body>
<form method="POST">
<input type="hidden" name="ID" id="Id"><br><br>
Фамилия:<br> <input type="text" name="F" id="F"><br><br>
Имя:<br> <input type="text" name="N"id="N"><br><br>
Отчество:<br> <input type="text" name="O" id="O"><br><br>
Дата рождения в формате (гггг-мм-дд):<br> <input type="text" name="D" id="D"><br><br>
Специальность:<br> <input type="text" name="S" id="S"><br><br>
<input type="submit" name="send" value="Обновить">
<input type="submit" name="send_2" value="Удалить">
</form>
<button id="button1" name="last" onclick="clickback()">Предыдущий</button>  <button id="button2" name="next" onclick="clicknext()">Следующий</button>
<input type="button" value="Выход в админ панель" id="button" onclick="bla()" >


<?php

if (isset($_POST['send']))
{
include 'setting.php';
$id=htmlspecialchars($_POST['ID']);
$F=htmlspecialchars($_POST['F']);
$N=htmlspecialchars($_POST['N']);
$O=htmlspecialchars($_POST['O']);
$D=htmlspecialchars($_POST['D']);
$S=htmlspecialchars($_POST['S']);
mysqli_set_charset($link,'utf8_decode');

$result = mysqli_query($link,"UPDATE students SET F='$F' , N='$N' , O='$O' , D='$D', S='$S' WHERE id='$id'")or die( mysqli_error($link) );

mysqli_close($link)or die( mysqli_error($link) );

}

?>
<?php

if (isset($_POST['send_2']))
{
include 'setting.php';
$id=htmlspecialchars($_POST['ID']);
$F=htmlspecialchars($_POST['F']);
$N=htmlspecialchars($_POST['N']);
$O=htmlspecialchars($_POST['O']);
$D=htmlspecialchars($_POST['D']);
$S=htmlspecialchars($_POST['S']);
mysqli_set_charset($link,'utf8_decode');
$resu=mysqli_query($link,"DELETE FROM students WHERE id='$id' ")or die( mysqli_error($link) );

mysqli_close($link)or die( mysqli_error($link) );

}

?>
</body>
</html>