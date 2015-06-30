<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Mantenedor de contenedores</title>
</head>
<body>
	<h2>Ingrese los datos de su contenedor</h2>
	<form action="<?php base_url();?>uihn/saveNew" method="post">

	<div> Seleccione al sistema al cual pertenece: 
	<select name="getId">
		<option></option>
		<?php for($i=0;$i<count($datosWs);$i++){?>
			<option value="<?php echo $datosWs[$i]['idWs']?>"><?php echo $datosWs[$i]['nomWs']?></option>
		<?php }?>
	</select>
	</div>
		<div>Ingrese el nombre del contenedor: <input type="text" name="nomC"></div>
		<div>Ingrese el id del contenedor: <input type="text" name="idC"></div>

		<input value="Guardar y Salir" type="submit">
	</form>
</body>
</html>