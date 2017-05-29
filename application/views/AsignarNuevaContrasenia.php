<?php echo form_open('ControladorUsuario/ValidarContrasenia') ; ?>
    <?php if (validation_errors()) : ?>
        <h3>Error:</h3>
        <p><?php echo validation_errors(); ?></p>
    <?php endif; ?>
    <h2>Cambio de Contraseña</h2>
	<div class="container" style="background: rgba(255, 255, 255, .8);">
            <div class="form-group">
                <?= form_label('Correo:','','class="form-control"',['id'=>'email']); ?>
                <br>
                <?= form_input(array('class' => 'form-control', 'name' => 'email', 'id' => 'email', 'value' => set_value('email', ''), 'maxlength' => '100', 'size' => '50', 'style' => 'width:100%')); ?>
            </div>
        	<div class="form-group">
                <?= form_label('Contraseña:','','class="form-control"',['id'=>'password1']); ?>
                <br>
                <?= form_password(array('class' => 'form-control', 'name' => 'password1', 'id' => 'password1', 'value' => set_value('password1', ''), 'maxlength' => '100', 'size' => '50', 'style' => 'width:100%')); ?>
            </div>
            <div class="form-group">
                <?= form_label('Confirmar Contraseña:','','class="form-control"',['id'=>'password2']); ?>
                <br>
                <?= form_password(array('class' => 'form-control', 'name' => 'password2', 'id' => 'password2', 'value' => set_value('password2', ''), 'maxlength' => '100', 'size' => '50', 'style' => 'width:100%')); ?>
            </div>
             <?php echo form_hidden('code', $code) ; ?>
            <?= form_submit('sbm', 'Cambiar', 'class="btn btn-primary"'); ?>
            or <?php echo anchor('ControladorUsuario/index', 'Cancelar'); ?>
   </div>
        
<?php echo form_close(); ?>