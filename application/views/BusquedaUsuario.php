<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<p><?= $msg ?></p>
<table>
	<tr>
		<th>Nombre Usuario</th>
		<th>Nombre</th>
		<th>Apellidos</th>
	</tr>
	<?php foreach ($usuarios as $usuario): ?>
	<tr>
		<td><a href="http://[::1]/sportremind/index.php/ControladorUsuario/ver_perfil/<?php echo $usuario->id; ?>"><?= $usuario->nombre_usuario ?></td>
		<td><?= $usuario->nombre ?></td>
		<td><?= $usuario->apellidos ?></td>
	<?php endforeach; ?>
</table>

