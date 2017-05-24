<div class="container" style="background: rgba(255, 255, 255, .8);">
	<br>
	<br>
	<br>
	<br>
	<?php echo form_open('Controlador_evento_deportivo/registrar_comentario'); ?> 
	<?php echo validation_errors(); ?>
	<div class="form-group" style="display:none;">
        <?= form_label('Id:','','class="form-control"',['id'=>'idEvento']); ?>
        <br>
        <?= form_input('idEvento',$id,'class="form-control"',['id'=>'idEvento']); ?>
  	</div>
	<div class="form-group">
        <?= form_label('Ingrese el comentario:','','class="form-control"',['id'=>'comentario']); ?>
        <br>
        <?= form_textarea('comentario','','class="form-control"',['id'=>'comentario']); ?>
	</div>
	<?= form_submit('sbm', 'Enviar Comentario', 'class="btn btn-primary"'); ?>
	<?= form_close(); ?>
</div>