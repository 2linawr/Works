<html>
<head>
<meta charset="utf-8">
<title>Обновление таблицы вопросов</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
var i=0;
window.onload=init;

function init()
{
	var text1= document.getElementById('id');
	var text2= document.getElementById('voprosu');
	var text3= document.getElementById('otvetu');
	$.ajax({ type : 'POST',url: '12.php',dataType:"json",success: function(ID)
	{
	$.ajax({ type : 'POST',url: '5.php',dataType:"json",success: function(V)
	{
		$.ajax({ type : 'POST',url: '6.php',dataType:"json",success: function(OT)
	{
			
			text2.value=V[0];
			text3.value=OT[0];
			text1.value=ID[0];
		
	}
	})
	}
	})	
	}
	})
}

function clickback()
{
	var text1= document.getElementById('id');
	var text2= document.getElementById('voprosu');
	var text3= document.getElementById('otvetu');
	
	$.ajax({ type : 'POST',url: '12.php',dataType:"json",success: function(ID)
	{
	$.ajax({ type : 'POST',url: '5.php',dataType:"json",success: function(V)
	{
		$.ajax({ type : 'POST',url: '6.php',dataType:"json",success: function(OT)
	{
		if(i>=1)
		{
			i-=1;
		}
		text2.value=V[i];
			text3.value=OT[i];
			text1.value=ID[i];
	}
	})
	}
	})	
	}
	})
}
	function clicknext()
	{
	var text1= document.getElementById('id');
	var text2= document.getElementById('voprosu');
	var text3= document.getElementById('otvetu');
	
	$.ajax({ type : 'POST',url: '12.php',dataType:"json",success: function(ID)
	{
	$.ajax({ type : 'POST',url: '5.php',dataType:"json",success: function(V)
	{
		$.ajax({ type : 'POST',url: '6.php',dataType:"json",success: function(OT)
	{
		
		if(i<=ID[i]){
			i+=1;
		
			text2.value=V[i];
			text3.value=OT[i];
			text1.value=ID[i];
		}
		
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
</script>
</head>
<body>

<form method="POST">
<input type="hidden" name="ID" id="id" ><br><br>
Вопрос:<br> <input type="text" name="voprosu" id="voprosu" ><br><br>
Ответ:<br> <input type="text" name="otvetu" id="otvetu" ><br><br>

<input type="submit" name="send" value="Обновить">
<input type="submit" name="send_2" value="Удалить">
</form>
<button id="button1" name="last" onclick="clickback()">Предыдущий вопрос</button>  <button id="button2" name="next" onclick="clicknext()">Следующий вопрос</button>
<br><br>
<input type="button" value="Выход" id="button" onclick="bla()" >
<?php

/*С помощью суперглобального массива $_POST
выводим принятые значения:*/

if (isset($_POST['send']))
{
include 'setting.php';
$id=htmlspecialchars($_POST['ID']);
$voprosu=htmlspecialchars($_POST['voprosu']);
$otvetu= htmlspecialchars($_POST['otvetu']);
//$link = mysqli_connect('localhost','root','','diplom')or die( mysqli_error($link) );


mysqli_set_charset($link,'utf8_decode');
$result = mysqli_query($link,"UPDATE voprosu SET voprosu='$voprosu', otvetu='$otvetu' WHERE id='$id'")or die( mysqli_error($link) );
mysqli_close($link)or die( mysqli_error($link) );

}

?>


<?php

/*С помощью суперглобального массива $_POST
выводим принятые значения:*/

if (isset($_POST['send_2']))
{
include 'setting.php';
$id=htmlspecialchars($_POST['ID']);
$voprosu=htmlspecialchars($_POST['voprosu']);
$otvetu= htmlspecialchars($_POST['otvetu']);
$nalichiadoc= htmlspecialchars($_POST['nalichiadoc']);
$namedoc= htmlspecialchars($_POST['namedoc']);
//$link = mysqli_connect('localhost','root','','diplom')or die( mysqli_error($link) );
mysqli_set_charset($link,'utf8_decode');

$res = mysqli_query($link,"DELETE FROM voprosu WHERE id='$id'")or die( mysqli_error($link) );
mysqli_close($link)or die( mysqli_error($link) );

}

?>

</body>
</html>