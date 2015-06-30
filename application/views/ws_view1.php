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

	<form id="tools" action="<?php base_url();?>ws/saveNew" method="post">
		<?php $auxH = 'asd'?>
		<select id="selectMe">
		<option></option>
 		<?php for($i=0;$i<count($datosT);$i++){ ?>
			<?php if($auxH != $datosT[$i]['nameWs']){?> 
				<option value="<?php echo $i?>"><?php echo $datosT[$i]['nameWs']?></option>
				<?php $auxH = $datosT[$i]['nameWs']?>
			<?php }?>
		<?php }?>
		</select>
		<?php $auxH = 'asd'?>
		<?php for($i=0;$i<count($datosT);$i++){ ?>
			<?php if($auxH != $datosT[$i]['nameWs']){?> 
				<div class="group" id="<?php echo $i?>">
				<h1> <?php echo $datosT[$i]['nameWs']?></h1>
				<?php $auxH = $datosT[$i]['nameWs']?>
			<?php }?>
			<div>
				<input type="checkbox" name="tooli[]" value="<?php echo $datosT[$i]['idTool'] ?>">
					<span>Herramienta: <?php echo $datosT[$i]['nameTool']?></span>
				
				</div>
			<?php if(($i+1)<count($datosT)) { ?>
				<?php if($auxH !=$datosT[$i+1]['nameWs'])  echo "</div>"?>
			<?php }?>
		<?php }?>
		</div>
		
	<input class="visible" value="Guardar y seguir" type="submit"><br>
	</form>

	<?php echo '<a class="visible" href ='.base_url().'exp/do_Logout> Logout</a>'; ?>

</body>
</html>