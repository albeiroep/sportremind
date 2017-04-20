<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php echo form_open('ControladorUsuario/pregunta_eliminar'); ?>
	<div class="container">
		<p> Escribe aquí tu motivo para eliminar tu cuenta: </p>
		<br>
		<?php 
			if(isset($mensaje)){
				echo "<font color='red'><strong>".$mensaje."</strong></font>";
			}
		?>
		<p><textarea id="motivo" name="motivo" rows="5" cols="50" class="form-control"></textarea></p>
		<p><input type="submit" value="Eliminar" class="btn btn-primary"></p>
	</div>
<?= form_close(); ?>
