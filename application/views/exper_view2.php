<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title></title>
</head>
<body>

<div>Usted no posee ningún experimento!</div>
<div>Crear un nuevo experimento</div>
<form id="newExp" action="<?php base_url();?>exper/nuevo">
	<input value="Nuevo Experimento" type="submit">
</form>
	<?php echo '<a href ='.base_url().'/exper/do_logout> Logout</a>'; ?>
</body>
</html>