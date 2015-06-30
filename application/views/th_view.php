<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Bienvenido al mantenedor de Tareas</title>
</head>
<body>

<h2>Bienvenido al mantenedor de tareas</h2>
<form id="new" action="<?php base_url();?>taskH/newTask">
	<input value="Ingresar nueva tarea" type="submit"><br>
</form>

	<?php echo '<a href ='.base_url().'/taskH/do_logout> Logout</a>'; ?>
</body>
</html>