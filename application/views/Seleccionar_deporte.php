<?php echo form_open('Controlador_evento_deportivo/ingresar_resultados_deporte'); ?>
<?php echo validation_errors(); ?>
<?php 
$opciones = array(
		'Futbol' => 'Futbol',
		'Baloncesto' => 'Baloncesto',
		'Pesas' => 'Pesas'
);
?>
<div class="form-group" style="display:none;">
          <?= form_label('Id:','','class="form-control"',['id'=>'idEvento']); ?>
          <br>
          <?= form_input('idEvento',$idEvento,'class="form-control"',['id'=>'idEvento']); ?>
  
</div>
<div class="form-group">
          <?= form_label('Deporte:','','class="form-control"',['id'=>'deporte']); ?>
          <br>
          <?= form_dropdown('deporte', $opciones, 'Futbol', 'class="form-control"'); ?>
</div>
<?= form_submit('sbm', 'Ingresar Resultados', 'class="btn btn-primary"'); ?>
<?= form_close(); ?>