<!DOCTYPE html>
<html>
<head>

	<meta charset = "UTF-8">
	<title></title>
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
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
	<?php $auxH = 'asd'?>
	<form id="tasks" action="<?php base_url();?>exp/sort" method="post">
		<?php for($i=0;$i<count($datosTasks);$i++){ ?>
			<?php if($auxH != $datosTasks[$i]['tipo']){?> 
				<h1> <?php echo $datosTasks[$i]['tipo']?></h1>
				<?php $auxH = $datosTasks[$i]['tipo']?>
			<?php }?>
			<div>
				<input type="checkbox" name="taski" value="<?php echo $datosTasks[$i]['id_task'] ?>">
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
		
	</form>

</body>
</html>