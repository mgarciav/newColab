<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title></title>
</head>
<body>
	<form id="oldExp" action="<?php base_url();?>exper/antiguo" method="post">
		<table id="exp">
			<tr>
				<td>Selección</td>
				<td>Nombre del Experimento</td>
				<td>Descripción</td>
				<td>Fecha de inicio</td>
				<td>Fecha Fin</td>
				<td>Estado</td>
			</tr>
			<?php for($j=0;$j<count($datosExp);$j++){ ?>
			<tr>
				<td>
					<input name="experi" type="radio" value="<?php echo $datosExp[$j]['id_exp'] ?>">
				</td>
				<td>
					<?php echo $datosExp[$j]['nom_exp']?>
				</td>
				<td>
					<?php echo $datosExp[$j]['desc']?>
				</td>
				<td>
					<?php echo $datosExp[$j]['fechaIni']?>
				</td>
				<td>
					<?php echo $datosExp[$j]['fechaFin']?>
				</td>
				<td>
					<?php echo $datosExp[$j]['estado']?>
				</td>

			</tr>
			<?php }?>
		</table>
		<input type="submit" value="Modificar" />
	</form>

<div>Crear un nuevo experimento</div>
<form id="newExp" action="<?php base_url();?>exper/nuevo">
	<input value="Nuevo Experimento" type="submit">
</form>
	<?php echo '<a href ='.base_url().'/exper/do_logout> Logout</a>'; ?>
</body>
</html>