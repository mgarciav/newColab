<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Bienvenido al mantenedor de herramientas</title>
</head>
<body>
	<h2>Ingrese los datos de su ambiente de trabajo</h2>
	<form action="<?php base_url();?>uiws/saveNew" method="post">
		<div>Ingrese el nombre del mantenedor: <input type="text" name="nomWs"></div>
		<div>Ingrese el id del mantenedor: <input type="text" name="idWs"></div>
		<input value="Guardar y Salir" type="submit">
	</form>
</body>
</html>