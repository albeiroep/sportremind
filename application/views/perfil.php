<div class="container">
	<h1 align="center"> Perfil </h1>
	<br>
	<br>
	<div class="row">
		<div class="col-md-3 col-md-offset-3">
			<a href="<?php echo base_url() ?>index.php/ControladorUsuario/editar_perfil?itemid=<?=$nom_usuario;?>">
			<input type="submit" value="Editar perfil" class="btn btn-primary" /></a>
		</div>
		<div class="col-md-3">
			<a href="<?php echo base_url() ?>index.php/Controlador_entrenamiento/consultar_entrenamiento?itemid=<?=$nom_usuario;?>">
			<input type="submit" value="Consultar entrenamientos" class="btn btn-primary" /></a>
		</div>
	</div>
</div>