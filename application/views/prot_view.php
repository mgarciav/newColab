<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title></title>
</head>
<body>
	<form id="oldProt" action="<?php base_url();?>prot/antiguo" method="post">
		<table id="exp">
			<tr>
				<td>Selección</td>
				<td>Nombre del Protocolo</td>
			</tr>
			<?php for($j=0;$j<count($datosProt);$j++){ ?>
			<tr>
				<td>
					<input name="proti" type="radio" value="<?php echo $datosProt[$j]['id']?>">
				</td>
				<td>
					<?php echo $datosProt[$j]['nombre']?>
				</td>
			</tr>
			<?php }?>
		</table>
		<input type="submit" value="Modificar" />
	</form>

<div>Crear un nuevo Protocolo</div>
<form id="newExp" action="<?php base_url();?>prot/nuevo">
	<input value="Nuevo Protocolo" type="submit">
</form>
	<?php echo '<a href ='.base_url().'/exper/do_logout> Logout</a>'; ?>
</body>
</html>