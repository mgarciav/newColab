<!DOCTYPE html>
<html>
<head>

	<meta charset = "UTF-8">
	<title></title>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
		$(document).on('ready', function(){
			$( "#sortable" ).sortable();
    		$( "#sortable" ).disableSelection();
		});
	</script>
</head>
<body>
	<h1>Ordene los pasos a seguir de su experimento</h1>
	<ul id="sortable" >
	<?php for($i=0;$i<count($datosSort);$i++){ ?>
		<li id="<?php echo $datosSort[$i]['id_task']?>" name="<?php echo $datosSort[$i]['nom_task']?>"><?php echo $datosSort[$i]['nom_task']?></li>
	<?php }?>
</body>
</html>