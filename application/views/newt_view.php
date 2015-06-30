<!DOCTYPE html>
<html>
<head>

	<meta charset = "UTF-8">
	<title>Bienvenido al mantenedor de tareas</title>
	  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	  <script src="<?php echo base_url(); ?>application/sources/jquery-ui-timepicker-addon.js"></script>
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/css/jquery-ui-timepicker-addon.css"/>
	  <script>


	  </script>
</head>
<body>
	<h2>Ingrese los datos de su nueva tarea</h2>
	<form action="<?php base_url();?>newT/saveNew" method="post">

		<div>Ingrese el nombre de la tarea: <input type="text" name="nomT"></div>
		<div>Ingrese la descripción de la tarea: <input type="text" name="descT"></div>
		<div>Ingrese el tipo de tarea: <input type="text" name="typeT"></div>
		<div>Ingrese la dirección de referencia de imagen: <input type="text" name="imgT"></div>
		<div>Ingrese la dirección asociada tarea: <input type="text" name="linkT"></div>
		<div>Ingrese la duración de la tarea: <input type="text" name="timeT" id="hora"></div>
		<div>Su tarea es del tipo automático? (La tarea la realiza el computador) <input type="checkbox" name="autoT" id="auto"></div>

		<input value="Siguiente" type="submit">
	</form>


</body>

</html>