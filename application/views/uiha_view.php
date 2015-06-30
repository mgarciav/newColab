<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<title>Mantenedor de contenedores</title>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  	<script>
  		$(document).on('ready', function(){
			$('#from').change(function(){
				$('#to').empty();
				var dropDown = document.getElementById("from");
				var idCont = dropDown.options[dropDown.selectedIndex].value;
				$.ajax({
            		type: "POST",
            		dataType: "text",
            		url: "http://localhost/newColab/uiha/getTo",
            		data: {idCont: idCont},
            		success: function(datos){
      	         		var opts = $.parseJSON(datos);
        				for(i=0; i<opts.length;i++){
                   			$('#to').append('<option value="' + opts[i].idTool + '">' + opts[i].nameTool + '</option>');
        				}
                		      				
                			
            		}
        		});
			});
		});
  	</script>
</head>
<body>
	<h2>Ingrese los datos de su contenedor</h2>
	<form action="<?php base_url();?>uiha/savePar" method="post">

	<div> Seleccione el contenedor: 
	<select name="getCont" id="from">
		<option></option>
		<?php for($i=0;$i<count($datos['cont']);$i++){?>
			<option value="<?php echo $datos['cont'][$i]['idCont']?>"><?php echo $datos['cont'][$i]['nomCont']?></option>
		<?php }?>
	</select>
	</div>
	<div> Seleccione la herramienta del contenedor: 
	<select name="getTool" id="to">
		<option></option>
		<?php for($i=0;$i<count($datos['tools']);$i++){?>
			<option value="<?php echo $datos['tools'][$i]['idTool']?>"><?php echo $datos['tools'][$i]['nomTool']?></option>
		<?php }?>
	</select>
	</div>
		<input value="Guardar y Salir" type="submit">
	</form>
</body>
</html>