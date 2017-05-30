<!DOCTYPE html>
<html>
<head>
	<title>Ventana Busqueda</title>
</head>
<body>
	<h1><?= $usuario ?></h1>
	<form method="post" action="http://[::1]/sportremind/index.php/ControladorUsuario/cargar_usuarios">
	<div>
	<p><label for="nom">Usuario: </label>
	<input id="nom" type="text" name="nom" value=""></p>
	<p><input type="submit" value="enviar" /></p>
	</div>	
	</form>

</body>
</html>


