<div>
	<header>
		<nav class="navbar navbar-default navbar-static-top" > <!-- o inverse-->
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
						<span class="sr-only">Menu</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<!--<a href="#" class="navbar-brand">Sport Remind</a>-->
				</div>
				<div class="collapse navbar-collapse" id="navbar-1">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo base_url() ?>index.php/ControladorUsuario/perfil">Perfil</a></li>
						<li><a href="<?php echo base_url() ?>index.php/Controlador_evento_deportivo/cargar_eventos">Eventos deportivos</a></li>
						<li><a href="<?php echo base_url() ?>index.php/ControladorUsuario/vistaEliminar">Eliminar cuenta</a></li>
						<li><a href="<?php echo base_url() ?>index.php/ControladorUsuario/logoff">Salir de sesión</a></li>
					</ul>

					<form method="post" action="<?php echo base_url() ?>index.php/ControladorUsuario/cargar_usuarios" class="navbar-form navbar-right" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Buscar" name="nom">
						</div>
						
					</form>
				</div>
			</div>
		</nav>
	</header>
</div>
<h1 align="center"> Bienvenido </h1>

