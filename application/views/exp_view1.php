<!DOCTYPE html>
<html>
<head>

	<meta charset = "UTF-8">
	<title></title>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
		$(document).on('ready', function(){
			$( ".datepicker" ).datepicker();
			$('.hidden').hide();
			$('.toggler').click(function(){
   				$('.hidden', $(this).parent()).toggle();
			});
		});
	</script>
</head>
<body>
	<?php $auxH = 'asd'?>
	<form id="tasks" action="<?php base_url();?>exp/sortNew" method="post">
		<p>Nombre del Experimento: <input type="text" name="nomProto"></p>
		<p>Descripción del Experimento: <input type="text" name="descProto"></p>
		<p>Nombre del protocolo asociado: <input type="text" name="nameProto"></p>
		<?php for($i=0;$i<count($datosTasks);$i++){ ?>
			<?php if($auxH != $datosTasks[$i]['tipo']){?> 
				<h1> <?php echo $datosTasks[$i]['tipo']?></h1>
				<?php $auxH = $datosTasks[$i]['tipo']?>
			<?php }?>
			<div>
				<input type="checkbox" name="taski[]" value="<?php echo $datosTasks[$i]['id_task'] ?>">
				<k class="toggler" >
				
					<span>Tarea: <?php echo $datosTasks[$i]['nom_task']?></span>
					<a class="hidden">
							<p>Descripción: <?php echo $datosTasks[$i]['desc'] ?></p>
							<p>Descripción: <?php echo $datosTasks[$i]['tiempo'] ?></p>
							<p><img src="<?php echo $datosTasks[$i]['foto']?>"/></p>
					</a>
				</k>
			</div>
		<?php }?>
		<p>Fecha de Inicio: <input type="text" class="datepicker" name="fechaIni"></p>
		<p>Fecha de Termino: <input type="text" class="datepicker" name="fechaFin"></p>
		<?php echo '<a href ='.base_url().'exp/saveLogout> Logout</a>'; ?>
	</form>

</body>
</html>