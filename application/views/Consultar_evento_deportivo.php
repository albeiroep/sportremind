<div class="container" style="background: rgba(255, 255, 255, .8);">
     <br>
     <br>
     <br>
  <div>
    <br>
	  <p style="font-size:26px;"> Parámetros de Búsqueda</p>
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
        <div class="border col-xs-6" style="background: rgba(255, 255, 255, .8);">
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
</br>
</br>
<?php if(isset($evento)): ?>
    <br><?php
      echo $evento;
      endif;
  ?>
<div>
	<p style="font-size:26px;">Listado de Eventos</p>
</div>
</br>
<div align="center">
<table class="table table-bordered table-condensed">
	<tr class="success">
    <td>Id</td>
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
	<?php foreach ($misEventos as $miEvento) {
    $id_usuario1= $miEvento->id_usuario;
    ?>
    <td><?=$miEvento->id ?></td>
		<td><?=$miEvento->nombre_evento?></td>
		<td><?=$miEvento->temperatura_esperada ?></td>
		<td><?=$miEvento->lugar ?></td>
		<td><?=$miEvento->fecha ?></td>
		<td><?=$miEvento->direccion_url ?></td>
		<td><?=$miEvento->categoria ?></td>
		<td><a href="<?php echo base_url() ?>index.php/Controlador_evento_deportivo/ingresar_comentario?itemid=<?=$miEvento->id;?>"><input type="button" value="Comentar" name="submit" /></a></td>
		<td><a href="<?php echo base_url() ?>index.php/Controlador_evento_deportivo/editar_evento_deportivo?itemid=<?=$miEvento->id?>&id_usuario=<?=$id_usuario1;?>"><input type="button" value="Editar" name="submit" /></a></td>
		<td><a onclick="if(confirma() == false) return false" href="<?php echo base_url() ?>index.php/Controlador_evento_deportivo/eliminar_evento_deportivo?itemid=<?=$miEvento->id?>&id_usuario=<?=$id_usuario1;?>"><input type="button" value="Eliminar" name="submit" /></a></td>
		<td><a href="<?php echo base_url() ?>index.php/Controlador_evento_deportivo/ingresar_resultados?itemid=<?=$miEvento->id;?>"><input type="button" value="Ingresar Resultados" name="submit" /></a></td>
	 </tr>
	 <?php } ?>
  </table>
  </div>
  </br>
  <div>
    <p style="font-size:26px;">Crear un Evento Deportivo</p>
  </div>
  <td><a href="<?php echo base_url() ?>index.php/Controlador_evento_deportivo/crear_evento_deportivo?itemid=<?=$id_usuario1;?>"><button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>  Crear Evento Deportivo</button></a><br></td>
  </br>
</div>

 

<script type="text/javascript">
function confirma(){
  if (confirm("¿Esta seguro de eliminar este evento deportivo?")){ 
    return true}
    else { 
    return false
  }
}
</script>