<?php echo form_open('ControladorUsuario/ValidarCorreo') ; ?>
    <?php if (validation_errors()) : ?>
        <h3>Error:</h3>
        <p><?php echo validation_errors(); ?></p>
    <?php endif; ?>
    <?php if (isset($submit_success)) : ?>
        <h3>Correo Enviado:</h3>
        <p>Un correo ha sido enviado al correo proveído.</p>
    <?php endif; ?>
    <table  >
        <tr>
            <td>Correo</td>
            <td><?php echo form_input(array('name' => 'email', 'id' => 'email', 'value' => set_value('email', ''), 'maxlength' => '100', 'size' => '50', 'style' => 'width:100%')); ?></td>
        </tr>
    </table>
    <?php echo form_submit('submit', 'Restablecer Contraseña'); ?>
    or <?php echo anchor('ControladorUsuario/index', 'Cancelar'); ?>
<?php echo form_close(); ?>