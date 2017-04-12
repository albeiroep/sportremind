<p><h1 align="center">Registrarse</h1></p>
<div align="center">
<?= form_open('ControladorUsuario/crear'); ?>

<?php
	$deporte[]='Deporte';
	foreach ($datos as $dato) {
		$deporte[$dato->nombre]=$dato->nombre;
	}
?>

<table border="0">
	<tr>

		<td><?= form_input('nombre', $nombre, 'placeholder="Nombre*"', ['id'=>'nombre']); ?></td>
		<td><?= form_input('apellidos', $apellidos, 'placeholder="Apellidos*"', ['id'=>'apellidos']); ?></td>
	</tr>
	<tr>
		<td><?= form_input('ciudad', $ciudad, 'placeholder="Ciudad*"', ['id'=>'ciudad']); ?></td>
		<td><?= form_dropdown('deporte', $deporte, $deporte1, ['id'=>'deporte']) ?>	</td>
	</tr>
	<tr>
		<td><?= form_input('correo', $correo, 'placeholder="Correo electrónico*"', ['id'=>'correo']); ?></td>
		<td><?= form_input('nombre_usuario', $nombre_usuario, 'placeholder="Nombre de Usuario*"', ['id'=>'nombre_usuario']); ?></td>
	</tr>
	<tr>
		<td><?= form_password('contrasena', $contraseña, 'placeholder="Contraseña*"', ['id'=>'contrasena']); ?></td>
		<td><?= form_password('repetir_contrasena', $repetir_contraseña, 'placeholder="Repetir Contraseña*"', ['id'=>'repetir_contrasena']); ?></td>
	</tr>
</table>
<br>
<font color="gray">* Indica los campos del formulario que son obligatorios</font>
<br>
<br>
<font color="gray"> La contraseña debe tener por lo menos 1 letra en mayúscula, <br> 1 en minúscula, 1 digito y 1 caracter especial y tener una longitud mayor o igual a 7</font>
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
<?php if(isset($mensaje)):
			echo $mensaje;
		endif;
?>

</div>