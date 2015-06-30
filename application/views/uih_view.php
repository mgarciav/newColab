<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Mantenedor de contenedores</title>
</head>
<body>

<h2>Bienvenido a la fábrica</h2>
<form id="new" action="<?php base_url();?>uih/nuevo">
	<input value="Crear nuevo contenedor" type="submit"><br>
</form>

<form id="new" action="<?php base_url();?>uih/addH">
	<input value="Agregar herramientas al contenedor" type="submit"><br>
</form>

	<?php echo '<a href ='.base_url().'/taskH/do_logout> Logout</a>'; ?>
</body>
</html>