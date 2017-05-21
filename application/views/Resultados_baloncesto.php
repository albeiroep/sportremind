<?php echo form_open('Controlador_evento_deportivo/guardar_resultados_baloncesto'); ?>
<?php echo validation_errors(); ?>
<div class="form-group" style="display:none;">
          <?= form_label('Deporte:','','class="form-control"',['id'=>'deporte']); ?>
          <br>
          <?= form_input('deporte',$deporte,'class="form-control"',['id'=>'deporte']); ?>
</div>
<div class="form-group" style="display:none;">
          <?= form_label('Id Evento:','','class="form-control"',['id'=>'idEvento']); ?>
          <br>
          <?= form_input('idEvento',$idEvento,'class="form-control"',['id'=>'idEvento']); ?>
  
</div>
<div class="form-group" >
          <?= form_label('Nombre Equipo 1:','','class="form-control"',['id'=>'nombre_equipo1']); ?>
          <br>
          <?= form_input('nombre_equipo1','','class="form-control"',['id'=>'nombre_equipo1']); ?>
</div>
<div class="form-group" >
          <?= form_label('Marcador Equipo 1:','','class="form-control"',['id'=>'marcador_equipo1']); ?>
          <br>
          <?= form_input('marcador_equipo1','','class="form-control"',['id'=>'marcador_equipo1']); ?>
</div>
<div class="form-group">
          <?= form_label('Nombre Equipo 2:','','class="form-control"',['id'=>'nombre_equipo2']); ?>
          <br>
          <?= form_input('nombre_equipo2','','class="form-control"',['id'=>'nombre_equipo2']); ?>
</div>
<div class="form-group">
          <?= form_label('Marcador Equipo 2:','','class="form-control"',['id'=>'marcador_equipo2']); ?>
          <br>
          <?= form_input('marcador_equipo2','','class="form-control"',['id'=>'marcador_equipo2']); ?>
</div>
<?= form_submit('sbm', 'Finalizar', 'class="btn btn-primary"'); ?>
<?= form_close(); ?>