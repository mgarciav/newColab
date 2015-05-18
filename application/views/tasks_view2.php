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
			var elemCheck = document.getElementsByName('taski[]');
			for(j=0;j<arrTasks.length;j++){
				for(k=0;k<elemCheck.length;k++){
					if(elemCheck[k].id == arrTasks[j]){		
						elemCheck[k].checked = true;
					}
				}
			}
			$( ".datepicker" ).datepicker();
			$('.hidden').hide();
			$('.toggler').click(function(){
   				$('.hidden', $(this).parent()).toggle();
			});		
			$('.group').hide();
  			$('#0').show();
  			$('#selectMe').change(function(){
    			$('.group').hide();
    			$('#'+$(this).val()).show();
  			});
			
			
		});
	</script>
</head>
<body>
	
	<form id="tasks" action="<?php base_url();?>tasks/upOld" method="post">
		<p>Nombre del Protocolo: <input type="text" name="nomProto" value="<?php echo $datos['allExp']['nameProt']?>"></p>
		<?php $auxH = 'asd'?>
		<select id="selectMe">
 		<?php for($i=0;$i<count($datos['datosTasks']);$i++){ ?>
			<?php if($auxH != $datos['datosTasks'][$i]['tipo']){?> 
				<option value="<?php echo $i?>"><?php echo $datos['datosTasks'][$i]['tipo']?></option>
				<?php $auxH = $datos['datosTasks'][$i]['tipo']?>
			<?php }?>
		<?php }?>
		</select>
		<?php $auxH = 'asd'?>
		<?php for($i=0;$i<count($datos['datosTasks']);$i++){ ?>
			<?php if($auxH != $datos['datosTasks'][$i]['tipo']){?> 
				<div class="group" id="<?php echo $i?>">
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
			<?php if(($i+1)<count($datos['datosTasks'])) { ?>
				<?php if($auxH !=$datos['datosTasks'][$i+1]['tipo'])  echo "</div>"?>
			<?php }?>
		<?php }?>
		</div>
		<input value="Guardar y seguir" type="submit"><br>
	

	</form>
	<?php echo '<a href ='.base_url().'/home/do_logout> Logout</a>'; ?>

</body>
</html>