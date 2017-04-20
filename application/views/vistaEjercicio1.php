<!DOCTYPE html>
<html>
<head>
</head>
<body>
	
	<form method="post" action="http://localhost/Eliminar_cuenta/index.php/Ejercicio1/login">
	<div>
	<p><label for="nom">Nombre de usuario: </label>
	<input id="nom" type="text" name="nom" value= <?php echo $nombre1; ?> ></p>

	<p><label for="pass">Contraseña: </label>
	<input id="pass" type="password" name="pass" /></p>

	<p><input type="submit" value="enviar" /></p>
	</div>	
	</form>

</body>
</html>


