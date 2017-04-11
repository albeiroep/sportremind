<p><h1 align="center">Registrarse</h1></p>
<div align="center">
<?= form_open('ControladorUsuario/crear'); ?>

<?php
	$deporte[]='';
	foreach ($datos as $dato) {
		$deporte[]=$dato->nombre;
	}
?>
<table border="0">
	<tr>

		<td><?= form_input('nombre', '', 'placeholder="Nombre*"', ['id'=>'nombre']); ?></td>
		<td><?= form_input('apellidos', '', 'placeholder="Apellidos*"', ['id'=>'apellidos']); ?></td>
	</tr>
	<tr>
		<td><?= form_input('ciudad', '', 'placeholder="Ciudad*"', ['id'=>'ciudad']); ?></td>
		<td><?= form_dropdown('deporte', $deporte, '', ['id'=>'deporte']) ?>	
	</tr>
	<tr>
		<td><?= form_input('correo', '', 'placeholder="Correo electrónico*"', ['id'=>'correo']); ?></td>
		<td><?= form_input('nombre_usuario', '', 'placeholder="Nombre de Usuario*"', ['id'=>'nombre_usuario']); ?></td>
	</tr>
	<tr>
		<td><?= form_password('contrasena', '', 'placeholder="Contraseña*"', ['id'=>'contrasena']); ?></td>
		<td><?= form_password('repetir_contrasena', '', 'placeholder="Repetir Contraseña*"', ['id'=>'repetir_contrasena']); ?></td>
	</tr>
</table>
<br>
<font color="gray">* Indica los campos del formulario que son obligatorios</font>
<br>
<br>
<?= form_submit('sbm', 'Crear'); ?>
<?= form_close(); ?>
<br>
<br>
<?php if (validation_errors()):
     	echo validation_errors();
	endif; ?>
<?php if(isset($usuario)):
			echo $usuario;
		endif;
?>
</div>