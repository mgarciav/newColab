<!DOCTYPE html>
<html>
<head>

	<meta charset = "UTF-8">
	<title></title>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
		$(document).on('ready', function(){
			$( "#sortable" ).sortable({
    			update: function (event, ui) {
        		var data = $(this).sortable('serialize');
        		console.log(data);
        		$.ajax({
           			 data: data,
       			     type: 'POST',
        			 url: 'http://localhost/newColab/sort/ordenTabla',
        			 success: function(){
        			 	 $("#test").html(data);
        			 }
				});
        		}
		
    		});
    		$( "#sortable" ).disableSelection();
	});

	</script>
</head>
<body>
	<h1>Ordene los pasos a seguir de su experimento</h1>
	<div>Nombre del paso 	duración	siguiente</div>
	
<form id="back" action="<?php base_url();?>sort/regreso">
	<ul id="sortable" >
	<?php for($i=0;$i<count($datosSort);$i++){ ?>
		<li id="item-<?php echo $datosSort[$i]['id_task']?>" name="<?php echo $datosSort[$i]['nom_task']?>"><?php echo $datosSort[$i]['nom_task']?> <input type="text" name="t<?php echo $datosSort[$i]['nom_task']?>"> <input type="text" name="h<?php echo $datosSort[$i]['nom_task']?>"></li>
	<?php }?>
	</ul>
	<input value="Guardar y volver al Menu principal" type="submit"><br>
</form>
</body>
</html>