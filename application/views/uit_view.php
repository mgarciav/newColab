<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Bienvenido al mantenedor de herramientas</title>
</head>
<body>
	<h2>Ingrese los datos de su ambiente de trabajo</h2>
	<form action="<?php base_url();?>uit/saveNew" method="post">

	<div> Seleccione al sistema de herramientas al cual pertenece: 
	<select name="getId">
		<option></option>
		<?php for($i=0;$i<count($datosWs);$i++){?>
			<option value="<?php echo $datosWs[$i]['idWs']?>"><?php echo $datosWs[$i]['nomWs']?></option>
		<?php }?>
	</select>
	</div>
		<div>Ingrese el nombre de la herramienta: <input type="text" name="nomT"></div>
		<div>Ingrese el id de la herramienta: <input type="text" name="idT"></div>

		<input value="Guardar y Salir" type="submit">
	</form>
</body>
</html>