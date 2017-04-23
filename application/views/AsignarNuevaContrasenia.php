<?php echo form_open('ControladorUsuario/ValidarContrasenia') ; ?>
    <?php if (validation_errors()) : ?>
        <h3>Error:</h3>
        <p><?php echo validation_errors(); ?></p>
    <?php endif; ?>
    <h2>Cambio de Contraseña</h2>

    <table border="0">
        <tr>
            <td>Correo</td>
            <td><?php echo form_input(array('name' => 'email', 'id' => 'email', 'value' => set_value('email', ''), 'maxlength' => '100', 'size' => '50', 'style' => 'width:100%')); ?></td>
        </tr>
        <tr>
            <td>Contraseña</td>
            <td><?php echo form_password(array('name' => 'password1', 'id' => 'password1', 'value' => set_value('password1', ''), 'maxlength' => '100', 'size' => '50', 'style' => 'width:100%')); ?></td>
        </tr>
        <tr>
            <td>Confirmar Contraseña</td>
            <td><?php echo form_password(array('name' => 'password2', 'id' => 'password2', 'value' => set_value('password2', ''), 'maxlength' => '100', 'size' => '50', 'style' => 'width:100%')); ?></td>
        </tr>
        
        <?php echo form_hidden('code', $code) ; ?>
    </table>
    <?php echo form_submit('submit', 'Cambiar'); ?>
    or <?php echo anchor('form', 'Cancelar'); ?>
<?php echo form_close(); ?>