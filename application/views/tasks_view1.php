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
			$('.group').hide();
  			$('#0').show();
  			$('#selectMe').change(function () {
    			$('.group').hide();
    			$('#'+$(this).val()).show();
  				})
		});
	</script>
</head>
<body>
	<form id="tasks" action="<?php base_url();?>tasks/saveNew" method="post">
		<p>Nombre del Protocolo: <input type="text" name="nomProto"></p>
		<?php $auxH = 'asd'?>
		<select id="selectMe">
 		<?php for($i=0;$i<count($datosTasks);$i++){ ?>
			<?php if($auxH != $datosTasks[$i]['tipo']){?> 
				<option value="<?php echo $i?>"><?php echo $datosTasks[$i]['tipo']?></option>
				<?php $auxH = $datosTasks[$i]['tipo']?>
			<?php }?>
		<?php }?>
		</select>
		<?php $auxH = 'asd'?>
		<?php for($i=0;$i<count($datosTasks);$i++){ ?>
			<?php if($auxH != $datosTasks[$i]['tipo']){?> 
				<div class="group" id="<?php echo $i?>">
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
			<?php if(($i+1)<count($datosTasks)) { ?>
				<?php if($auxH !=$datosTasks[$i+1]['tipo'])  echo "</div>"?>
			<?php }?>
		<?php }?>
		</div>
		
	<input class="visible" value="Guardar y seguir" type="submit"><br>
	</form>

	<?php echo '<a class="visible" href ='.base_url().'exp/do_Logout> Logout</a>'; ?>

</body>
</html>