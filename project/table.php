<html>
<head>
<meta charset="utf-8">
<title>Заполнение таблицы вопросов</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
function bla()
{
	document.location.replace("buttons.php");
	
}

</script>
</head>
<body>
<form method="POST"> <!--указание метода POST-->
Вопрос:<br> <input type="text" name="voprosu" required ><br><br>
Ответ:<br> <input type="text" name="otvetu" required><br><br>
<input type="submit" name="send" value="Отправить">
</form>
<input type="button" value="Выход" id="button" onclick="bla()" >
<?php

/*С помощью суперглобального массива $_POST
выводим принятые значения:*/
if (isset($_POST['send'])){
	include 'setting.php';
$voprosu=htmlspecialchars($_POST['voprosu']);
$otvetu= htmlspecialchars($_POST['otvetu']);
//$link = mysqli_connect('localhost','root','','diplom')or die( mysqli_error($link) );
mysqli_set_charset($link,'utf8_decode');
$result = mysqli_query($link,"INSERT INTO voprosu (voprosu, otvetu) VALUES ('$voprosu','$otvetu')")or die( mysqli_error($link) );
mysqli_close($link)or die( mysqli_error($link) );
}
?>
</body>
</html>