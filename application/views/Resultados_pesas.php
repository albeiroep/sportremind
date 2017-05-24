<div class="container" style="background: rgba(255, 255, 255, .8);">
     <br>
     <br>
     <br>
	<?php echo form_open('Controlador_evento_deportivo/guardar_resultados_pesas'); ?>
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
          <?= form_label('Peso Levantado (Kg):','','class="form-control"',['id'=>'peso_levantado']); ?>
          <br>
          <?= form_input('peso_levantado','','class="form-control"',['id'=>'peso_levantado']); ?>
	</div>
	<?= form_submit('sbm', 'Finalizar', 'class="btn btn-primary"'); ?>
	<?= form_close(); ?>
</div>