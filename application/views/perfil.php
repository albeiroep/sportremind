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
						<li><a href="<?php echo base_url() ?>index.php/ControladorUsuario/editar_perfil?itemid=<?=$nom_usuario;?>">Editar Perfil</a></li>
						<li><a href="<?php echo base_url() ?>index.php/Controlador_entrenamiento/consultar_entrenamiento?itemid=<?=$nom_usuario;?>">Consultar Entrenamientos</a></li>
					</ul>


				</div>
			</div>
		</nav>
	</header>
</div>
<h1 align="center"> Perfil </h1>