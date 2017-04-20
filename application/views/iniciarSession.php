<!DOCTYPE HTML>
<html>
	<head>
		<title>Iniciar Sesión</title>
	</title>
	 <body>
	 	<DIV ALIGN=center>Sport Remind</DIV>
	 	<div align="center" styl> 
	 	<h4>Iniciar Sesión</h4>
	 	<?php echo validation_errors(); ?>
	 	<?php echo form_open('LoginController/checkLogin'); ?>

	 	Nombre:<br/>
	 	<input type="text" name="username"/><br/>

	 	Contrasena:<br/>
	 	<input type="text" name="password" /><br/>
	 	<br/>

	 	<input type="submit" value="login" name="submit" style="color:blue"/>
	 	</form>
	 </div>	
	 </body>	
</html>