<html>
<head>
<meta charset="utf-8">
<title>Ответ клиентам</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
var i=0;
window.onload=init;

function init()
{
	var text1= document.getElementById('Id');
	var text2= document.getElementById('voprosu');
	text1.value=i;
	$.ajax({ type : 'POST',url: '14.php',dataType:"json",success: function(id)
	{
	$.ajax({ type : 'POST',url: '11.php',dataType:"json",success: function(V)
	{
	
			text2.value=V[0];
			text1.value=id[0];
	
	}
	})
	}
	})
	}

function clickback()
{
	var text1= document.getElementById('Id');
	var text2= document.getElementById('voprosu');
	$.ajax({ type : 'POST',url: '14.php',dataType:"json",success: function(id)
	{
	$.ajax({ type : 'POST',url: '11.php',dataType:"json",success: function(V)
	{
			if(i>0)
		{
			i-=1;
		}
		text2.value=V[i];
		text1.value=id[i];
	}
	})
	}
	})
}

	function clicknext()
	{
	var text1= document.getElementById('Id');
	var text2= document.getElementById('voprosu');
	$.ajax({ type : 'POST',url: '14.php',dataType:"json",success: function(id)
	{

	$.ajax({ type : 'POST',url: '11.php',dataType:"json",success: function(V)
	{
	if(i<=id[i]){
			i+=1;
		
		
		}
	
	
	
			text2.value=V[i];
			text1.value=id[i];
	}
	})
	}
	})
	}
	
	
	
	
	function bla()
{
	document.location.replace("buttons.php");
	
}
</script>
</head>
<body>


<form method="POST">
<input type="hidden" name="Id" id="Id"><br><br>
Вопрос:<br> <textarea style="width:175px;" type="text" name="voprosu" id="voprosu" ></textarea><br><br>
Ответ:<br> <input type="text" name="otvetu" id="otvetu" ><br><br>
<input type="submit" name="send" value="Ответить">
<input type="submit" name="send2" value="Удалить глупый вопрос">
</form>
<button id="button1" name="last" onclick="clickback()">Предыдущий вопрос</button>  <button id="button2" name="next" onclick="clicknext()">Следующий вопрос</button>

<input type="button" value="Выход" id="button" onclick="bla()" >
<?php

/*С помощью суперглобального массива $_POST
выводим принятые значения:*/

if (isset($_POST['send']))
{
include 'setting.php';

$id=htmlspecialchars($_POST['Id']);
$voprosu=htmlspecialchars($_POST['voprosu']);
$otvetu= htmlspecialchars($_POST['otvetu']);
//$link = mysqli_connect('localhost','root','','diplom')or die( mysqli_error($link) );
mysqli_set_charset($link,'utf8_decode');
$result = mysqli_query($link,"INSERT INTO voprosu (voprosu, otvetu) VALUES ('$voprosu','$otvetu')")or die( mysqli_error($link) );
$res=mysqli_query($link,"DELETE FROM vopros_clint WHERE id='$id'")or die( mysqli_error($link) );



mysqli_close($link)or die( mysqli_error($link) );

}

if (isset($_POST['send2']))
{
include 'setting.php';

$id=htmlspecialchars($_POST['Id']);
$voprosu=htmlspecialchars($_POST['voprosu']);

mysqli_set_charset($link,'utf8_decode');
$resu=mysqli_query($link,"DELETE FROM vopros_clint WHERE id='$id'")or die( mysqli_error($link) );

mysqli_close($link)or die( mysqli_error($link) );

}
?>
</body>
</html>