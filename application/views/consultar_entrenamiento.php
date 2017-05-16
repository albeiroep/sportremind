<div class="container">
	<?php if(isset($entrenamiento)): ?>
		<br><?php
    	echo $entrenamiento;
    	endif;
	?>
	<h1 align="center">Entrenamientos</h1>
	<br>
	<table class="table table-bordered table-condensed">
		<tr class="success">
			<td>Id</td>
			<td>Nombre</td>
			<td>Duración</td>
			<td>Calorías perdidas</td>
			<td>Fecha</td>
			<td>Lugar</td>
			<td>Imagen</td>
		</tr>
		<?php foreach ($datos as $dato) {
			$id_usuario1= $dato->id_usuario;
		?>
		<tr>
			<td><?= $dato->id; ?></td>
			<td><?= $dato->nombre; ?></td>
			<td><?= $dato->duracion; ?></td>
			<td><?= $dato->calorias_perdidas; ?></td>
			<td><?= $dato->fecha; ?></td>
			<td><?= $dato->lugar; ?></td>
			<td><?= $dato->imagen; ?></td>
			<td><a href="<?php echo base_url() ?>index.php/Controlador_entrenamiento/editar_entrenamiento?itemid=<?=$dato->id;?>"><button class="btn btn-sm btn-success"><span class="glyphicon glyphicon-pencil"></span>  Editar entrenamiento</button></a><br></td>
			<td><a onclick="if(confirma() == false) return false" href="<?php echo base_url() ?>index.php/Controlador_entrenamiento/eliminar_entrenamiento?itemid=<?=$dato->id?>&id_usuario=<?=$id_usuario1?>"><button class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span>  Eliminar entrenamiento</button></a><br></td>
		
		</tr>
		<?php }?>
	</table>
	<br>
	<?php if(isset($id_usuario1)){ ?>
		<a href="<?php echo base_url() ?>index.php/Controlador_entrenamiento/publicar_entrenamiento?itemid=<?=$id_usuario1;?>"><button class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-ok"></span>  Publicar entrenamiento</button></a>
	<?php }else{ ?>
		<a href="<?php echo base_url() ?>index.php/Controlador_entrenamiento/publicar_entrenamiento?itemid=<?=$id_usuario;?>"><button class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-ok"></span>  Publicar entrenamiento</button></a>
	<?php }
	?>
		
<div>

<script type="text/javascript">
function confirma(){
	if (confirm("¿Esta seguro de eliminar este entrenamiento?")){ 
		return true}
		else { 
		return false
	}
}
</script>

