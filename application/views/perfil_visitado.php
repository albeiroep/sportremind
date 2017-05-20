<?php
defined('BASEPATH') OR exit('No direct script access allowed');
///////////////////////////////////////////////////////////id
?>
<table>
	<tr>

		<th>Nombre Usuario</th>
	</tr>
	<?php foreach ($usuarios as $usuario): ?>
	<tr>
		<td><?= $usuario->nombre_usuario ?></td>
	<?php endforeach; ?>
</table>

