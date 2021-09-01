	<html>
	<head>
	<meta char="utf-8"></meta>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script>
	function b()
		{
								 
					 if($("#login").val()=="1"&& $("#password").val()=="1")
					 {
						document.location.replace("buttons.php");
					 }
		}
	</script>
	</head>
	<body>
	<div id="add">
	Login:<br><input type="text" id="login">
	<br>
	Password:<br><input type="password" id="password">
	<br><br>
	<button id="button" onclick="b()" >Войти</button>
	</div>
	</body>
	</html>