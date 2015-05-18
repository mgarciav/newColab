<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Bienvenido a la fábrica</title>
</head>
<body>

<h2>Seleccione una sección para modificar</h2>
<form id="Exp" action="<?php base_url();?>home/exp">
	<input value="Administración de Experimentos" type="submit">
</form>
<form id="Prot" action="<?php base_url();?>home/prot">
	<input value="Administración de Protocolos" type="submit">
</form>
<form id="UI" action="<?php base_url();?>home/ui">
	<input value="Administración de Interfaces" type="submit">
</form>
	<?php echo '<a href ='.base_url().'/home/do_logout> Logout</a>'; ?>
</body>
</html>