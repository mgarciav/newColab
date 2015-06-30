<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Bienvenido al mantenedor de herramientas</title>
</head>
<body>

<h2>Seleccione una sección para modificar</h2>
<form id="Prot" action="<?php base_url();?>ui/uiws">
	<input value="Administración de Sistemas" type="submit"><br>
</form>
<form id="Exp" action="<?php base_url();?>ui/uih">
	<input value="Administración de contenedores" type="submit"><br>
</form>
<form id="Exp" action="<?php base_url();?>ui/uit">
	<input value="Administración de herramientas de vistas" type="submit"><br>
</form>
<form id="casita" action="<?php base_url();?>ui/casita">
	<input value="Volver a home" type="submit"><br>
</form>
	<?php echo '<a href ='.base_url().'/home/do_logout> Logout</a>'; ?>
</body>
</html>