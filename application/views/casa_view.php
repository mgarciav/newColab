<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Bienvenido a la fábrica</title>
</head>
<body>

<h2>Bienvenido a la fábrica</h2>
<form id="new" action="<?php base_url();?>casa/manExp">
	<input value="Mantenedor de Experimentos" type="submit"><br>
</form>

<form id="new" action="<?php base_url();?>casa/manTool">
	<input value="Mantenedor de Herramientas" type="submit"><br>
</form>

<form id="new" action="<?php base_url();?>casa/manTask">
	<input value="Mantenedor de Tareas" type="submit"><br>
</form>


	<?php echo '<a href ='.base_url().'/taskH/do_logout> Logout</a>'; ?>
</body>
</html>