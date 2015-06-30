<!DOCTYPE html>
<html>
<head>

	<meta charset = "UTF-8">
	<title></title>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
		$(document).on('ready', function(){
			$('[name="tooli[]"]').on('change', function() {
   		    	$(this).next(':checkbox').prop('disabled', !this.checked);
			});
			
			$('.hidden').hide();
			$('.toggler').click(function(){
   				$('.hidden', $(this).parent()).toggle();
			});
			$('.group').hide();
  			$('#a0').show();
  			$('#selectMe').change(function () {
    			$('.group').hide();
    			$('#'+$(this).val()).show();
  				}).change();
  			
  			
		});
	</script>
</head>
<body>
	<form id="tools" action="<?php base_url();?>tasktool/save" method="post">
		<h1> Seleccione las herramientas a utilizar en esta tarea</h1>
		<?php $auxH = 'asd'?>
		<select id="selectMe">
		<option></option>
 		<?php for($i=0;$i<count($arrDatos);$i++){ ?>
			<?php if($auxH != $arrDatos[$i]['cont']){?> 
				<option value="a<?php echo $i?>"><?php echo $arrDatos[$i]['cont']?></option>
				<?php $auxH = $arrDatos[$i]['cont']?>
			<?php }?>
		<?php }?>
		</select>
		</br>
		<?php $auxH = 'asd'?>

		<?php for($i=0;$i<count($arrDatos);$i++){ ?>
			<?php if($auxH != $arrDatos[$i]['cont']){?> 
				<div class="group" id="a<?php echo $i?>">
				<h1> <?php echo $arrDatos[$i]['cont']?></h1>
				<div>
			
				Nombre de la herramienta
			
				Selección
		
				Visible?
				</div>
				<?php $auxH = $arrDatos[$i]['cont']?>
			<?php }?>
			
					<?php echo $arrDatos[$i]['nameTool']?>		
				
					<input type="checkbox" name="tooli[]" value="<?php echo $arrDatos[$i]['idTool'] ?>">		
			
					<input type="checkbox" name="visi[]"disabled>
			
			

			<?php if(($i+1)<count($arrDatos)) { ?>
				<?php if($auxH !=$arrDatos[$i+1]['cont'])  echo "</div>"?>
			<?php }?>
		<?php }?>
		</div>
		


	<input class="visible" value="Guardar y seguir" type="submit"><br>
	</form>

	<?php echo '<a class="visible" href ='.base_url().'exp/do_Logout> Logout</a>'; ?>

</body>
</html>