<!DOCTYPE HTML>
<html>
	<head>
		<title>Login Usuario</title>
	</title>
	 <body>
	 	<div class="container">
	 		<h1 align="center"> Bienvenido </h1>
	 		<br>
	 		<br>
	 		<div class="row">
	 			<div class="col-md-3 col-md-offset-4">
	 				<?php echo form_open('ControladorUsuario/vistaEliminar'); ?>
	 					<input type="submit" value="Eliminar cuenta" class="btn btn-primary">
	 				<?= form_close(); ?>
	 			</div>
	 			<div class="col-md-3">
	 				<?php echo form_open('ControladorUsuario/logoff'); ?>
	 					<input type="submit" value="Salir de sesión" class="btn btn-primary">
	 				<?= form_close(); ?>
	 			</div>
	 		</div>
		</div>
	 </body>	
</html>