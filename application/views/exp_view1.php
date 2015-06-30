<!DOCTYPE html>
<html>
<head>

	<meta charset = "UTF-8">
	<title></title>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
		$(document).on('ready', function(){
			$('.hidden').hide();
			$('.toggler').click(function(){
   				$('.hidden', $(this).parent()).toggle();
			});
		});
	</script>
</head>
<body>
	<form id="tasks" action="<?php base_url();?>exp/saveNew" method="post">
		<p>Nombre del Experimento: <input type="text" name="nomProto"></p>
		<p>Descripción del Experimento: <input type="text" name="descProto"></p>
		<select name="protocolo">
			<?php $auxH = $datosProt[0]?>
			<option value="<?php echo $auxH ?>"><?php echo $auxH ?></option>
			<?php for($i=0;$i<count($datosProt);$i++){ ?>
					<?php if($auxH != $datosProt[$i]){?>
						<option value="<?php echo $datosProt[$i]?>"><?php echo $datosProt[$i]?></option></br>
						<?php $auxH= $datosProt[$i] ?>
					<?php }?>
			<?php }?>
		</select>
		<p>Fecha de Inicio: <input type="text" class="datepicker" name="fechaIni"></p>
		<p>Fecha de Termino: <input type="text" class="datepicker" name="fechaFin"></p>
		<input value="Guardar y seguir" type="submit"><br>
		<?php echo '<a href ='.base_url().'exp/do_Logout> Logout</a>'; ?>
	</form>

</body>
</html>