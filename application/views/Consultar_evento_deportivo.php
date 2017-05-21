<div>
	<p style="font-size:26px;">Parámetros de Búsqueda</p>
</div>
</br>
<div id="filtros" class="row">
	<?php echo form_open('Controlador_evento_deportivo/listar_eventos'); ?> 
      <?php echo validation_errors(); ?>
        <div class="border col-xs-6">
        <div class="form-group">
          <?= form_label('Nombre de Evento:','','class="form-control"',['id'=>'nombre_evento']); ?>
          <br>
          <?= form_input('nombre_evento','','class="form-control"',['id'=>'nombre_usuario']); ?>
        </div>
		<div class="form-group">
          <?= form_label('Temperatura Esperada:','','class="form-control"',['id'=>'temperatura_esperada']); ?>
          <br>
          <?= form_input('temperatura_esperada','','class="form-control"',['id'=>'temperatura_esperada']); ?>
        </div>
        <div class="form-group">
          <?= form_label('Lugar:','','class="form-control"',['id'=>'lugar']); ?>
          <br>
          <?= form_input('lugar','','class="form-control"',['id'=>'lugar']); ?>
        </div>
        </div>
        <div class="border col-xs-6">
        <div class="form-group">
          <?= form_label('Fecha Inicial:','','class="form-control"',['id'=>'fecha_inicial']); ?>
          <br>
          <?= form_input('fecha_inicial','','class="form-control"',['id'=>'fecha_inicial']); ?>
        </div>
        <div class="form-group">
          <?= form_label('Fecha Final:','','class="form-control"',['id'=>'fecha_final']); ?>
          <br>
          <?= form_input('fecha_final','','class="form-control"',['id'=>'fecha_final']); ?>
        </div>
        <div class="form-group">
          <?= form_label('Categoría:','','class="form-control"',['id'=>'categoria']); ?>
          <br>
          <?= form_input('categoria','','class="form-control"',['id'=>'categoria']); ?>
        </div>
        </div>		
        <?= form_submit('sbm', 'Buscar', 'class="btn btn-primary"'); ?>
      <?= form_close(); ?>
</div>
</br>
<div>
	<p style="font-size:26px;">Listado de Eventos</p>
</div>
</br>
<div align="center">
<table border="2">
	<tr>
		<td>Nombre</td>
		<td>Temperatura Esperada</td>
		<td>Lugar</td>
		<td>Fecha</td>
		<td>URL</td>
		<td>Categoría</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
	<?php foreach ($misEventos as $miEvento) {?>
		<td><?=$miEvento->nombre_evento?></td>
		<td><?=$miEvento->temperatura_esperada ?></td>
		<td><?=$miEvento->lugar ?></td>
		<td><?=$miEvento->fecha ?></td>
		<td><?=$miEvento->direccion_url ?></td>
		<td><?=$miEvento->categoria ?></td>
		<td><a href="<?php echo base_url() ?>index.php/Controlador_evento_deportivo/ingresar_comentario?itemid=<?=$miEvento->id;?>"><input type="button" value="Comentar" name="submit" /></a></td>
		<td><a href="<?php echo base_url() ?>index.php/Controlador_evento_deportivo/editar?itemid=<?=$miEvento->id;?>"><input type="button" value="Editar" name="submit" /></a></td>
		<td><a href="<?php echo base_url() ?>index.php/Controlador_evento_deportivo/eliminar?itemid=<?=$miEvento->id;?>"><input type="button" value="Eliminar" name="submit" /></a></td>
		<td><a href="<?php echo base_url() ?>index.php/Controlador_evento_deportivo/ingresar_resultados?itemid=<?=$miEvento->id;?>"><input type="button" value="Ingresar Resultados" name="submit" /></a></td>
	</tr>
	<?php } ?>
</table>
</div>