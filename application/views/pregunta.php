<div class="container" style="background: rgba(255, 255, 255, .8);">
	<p align="center"> Esta seguro que desea eliminar la cuenta? </p>
	<br>
	<div class="row">
		<div class="col-md-3 col-md-offset-4">
			<?php echo form_open('ControladorUsuario/eliminar'); ?>
				<p><input type="submit" value="Confirmar" class="btn btn-primary"></p>
			<?= form_close(); ?>
		</div>
		<div class="col-md-3">
			<?php echo form_open('ControladorUsuario/login'); ?>
				<p><input type="submit" value="Cancelar" class="btn btn-primary"></p>
			<?= form_close(); ?>
		</div>
	</div>
</div>