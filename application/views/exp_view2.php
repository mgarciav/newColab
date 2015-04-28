<!DOCTYPE html>
<html>
<head>

	<meta charset = "UTF-8">
	<title></title>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

	<script>
		var arrTasks= <?php echo json_encode($datos['allExp']['taskCheck'])?>;
		$(document).on('ready', function(){
			$( ".datepicker" ).datepicker();
			$('.hidden').hide();
			$('.toggler').click(function(){
   				$('.hidden', $(this).parent()).toggle();
			});
			var elemCheck = document.getElementsByName('taski[]');
			for(j=0;j<arrTasks.length;j++){
				for(k=0;k<elemCheck.length;k++){
					if(elemCheck[k].id == arrTasks[j]){		
						elemCheck[k].checked = true;
					}
				}
			}
		});
	</script>
</head>
<body>
	<?php $auxH = 'asd'?>
	<form id="tasks" action="<?php base_url();?>exp/sortOld" method="post">
		<p>Nombre del Experimento: <input type="text" name="nomProto" value="<?php echo $datos['allExp']['nom_exp']?>"></p>
		<p>Descripción del Experimento: <input type="text" name="descProto" value="<?php echo $datos['allExp']['desc']?>"></p>
		<p>Nombre del Protocolo asociado: <?php echo $datos['allExp']['nameProt']?> </p>
		<?php for($i=0;$i<count($datos['datosTasks']);$i++){ ?>
			<?php if($auxH != $datos['datosTasks'][$i]['tipo']){?> 
				<h1> <?php echo $datos['datosTasks'][$i]['tipo']?></h1>
				<?php $auxH = $datos['datosTasks'][$i]['tipo']?>
			<?php }?>
			<div>
				<input type="checkbox" name="taski[]" value="<?php echo $datos['datosTasks'][$i]['id_task'] ?>" id="<?php echo $datos['datosTasks'][$i]['id_task'] ?>">
				<k class="toggler">
				
					<span>Tarea: <?php echo $datos['datosTasks'][$i]['nom_task']?></span>
					<a class="hidden">
							<p>Descripción: <?php echo $datos['datosTasks'][$i]['desc'] ?></p>
							<p>Descripción: <?php echo $datos['datosTasks'][$i]['tiempo'] ?></p>
							<p><img src="<?php echo $datos['datosTasks'][$i]['foto']?>"/></p>
					</a>
				</k>
			</div>
		<?php }?>
		<p>Fecha de Inicio: <input type="text" class="datepicker" name="fechaIni" value="<?php echo $datos['allExp']['fechaIni']?>"></p>
		<p>Fecha de Termino: <input type="text" class="datepicker" name="fechaFin" value="<?php echo $datos['allExp']['fechaFin']?>"></p>
		<input value="Guardar y seguir" type="submit"><br>
		<?php echo '<a href ='.base_url().'/home/do_logout> Logout</a>'; ?>

	</form>

</body>
</html>