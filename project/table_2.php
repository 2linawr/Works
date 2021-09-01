<html>
<head>
<meta charset="utf-8">
<title>Заполнение таблицы со студентами.</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
function bla()
{
	document.location.replace("buttons.php");
	
}

</script>
</head>
<body>
<form method="POST"> 
<!--указание метода POST-->
Фамилия:<br> <input type="text" name="F" required><br><br>
Имя:<br> <input type="text" name="N" required><br><br>
Отчество:<br> <input type="text" name="O" required><br><br>
Дата рождения:<br> <input type="text" name="D" required><br><br>
Специальность:<br> <input type="text" name="S" required><br><br>
<input type="submit" name="send" value="Отправить">
</form>
<input type="button" value="Выход" id="button" onclick="bla()" >
<?php

/*С помощью суперглобального массива $_POST
выводим принятые значения:*/
if (isset($_POST['send'])){
$F=htmlspecialchars($_POST['F']);
$N=htmlspecialchars($_POST['N']);
$O=htmlspecialchars($_POST['O']);
$D=htmlspecialchars($_POST['D']);
$S=htmlspecialchars($_POST['S']);
include 'setting.php';

mysqli_set_charset($link,'utf8_decode');
$result = mysqli_query($link,"INSERT INTO students (F, N, O, D,S) VALUES ('$F','$N','$O','$D','$S')")or die( mysqli_error($link) );
mysqli_close($link)or die( mysqli_error($link) );
}
?>
</body>
</html>