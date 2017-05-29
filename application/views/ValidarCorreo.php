<?php echo form_open('ControladorUsuario/ValidarCorreo') ; ?>
    <?php if (validation_errors()) : ?>
        <h3>Error:</h3>
        <p><?php echo validation_errors(); ?></p>
    <?php endif; ?>
    <?php if (isset($submit_success)) : ?>
        <h3>Correo Enviado:</h3>
        <p>Un correo ha sido enviado al correo proveído.</p>
    <?php endif; ?>
        <div class="container" style="background: rgba(255, 255, 255, .8);">
            <div class="form-group">
                <?= form_label('Correo:','','class="form-control"',['id'=>'correo']); ?>
                <br>
                <?= form_input('email', set_value('email', ''), 'class="form-control"', ['id'=>'email']); ?>
            </div>
        
            <?= form_submit('sbm', 'Restablecer contraseña', 'class="btn btn-primary"'); ?>
            or <?php echo anchor('ControladorUsuario/index', 'Cancelar'); ?>
        </div>
<?php echo form_close(); ?>