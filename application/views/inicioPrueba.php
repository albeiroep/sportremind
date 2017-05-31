<!DOCTYPE html>
<html>
<head>
	<title>Ventana Busqueda</title>
</head>
<body>

	<?php foreach ($usuarios as $usuario): ?>
	<tr>
		<td><?= $usuario->id ?></td>
	<?php endforeach; ?>

	<form method="post" action="http://[::1]/sportremind/index.php/ControladorUsuario/cargar_usuarios">
	<div>
	<p><label for="nom">Usuario: </label>
	<input id="nom" type="text" name="nom" value=""></p>
	<p><input type="submit" value="enviar" /></p>
	</div>	
	</form>

</body>
</html>


