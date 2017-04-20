<?php
  $deporte[]='Deporte';
  foreach ($datos as $dato) {
    $deporte[$dato->nombre]=$dato->nombre;
  }

  $nom = array(
          'name'        => 'nombre',
          'value'       => $nombre,
          'placeholder' =>'Nombre',
          'class'       => 'form-control',
        );

  $ape = array(
          'name'        => 'apellidos',
          'value'       => $apellidos,
          'placeholder' =>'Apellidos',
          'class'       => 'form-control',
        );

  $ciu = array(
          'name'        => 'ciudad',
          'value'       => $ciudad,
          'placeholder' =>'Ciudad',
          'class'       => 'form-control',
        );

  $cor = array(
          'name'        => 'correo',
          'value'       => $correo,
          'placeholder' =>'Correo electrónico',
          'class'       => 'form-control',
        );

    $nomU = array(
          'name'        => 'nombre_usuario',
          'value'       => $nombre_usuario,
          'placeholder' =>'Nombre de Usuario',
          'class'       => 'form-control',
        );

    $cont = array(
          'name'        => 'contrasena',
          'value'       => $contraseña,
          'placeholder' =>'Contraseña',
          'class'       => 'form-control',
        );

    $rcont = array(
          'name'        => 'repetir_contrasena',
          'value'       => $repetir_contraseña,
          'placeholder' =>'Repetir Contraseña',
          'class'       => 'form-control',
        );
?>

<div class='container'>
  <div class="row"> 
    <div class="col-md-5">
      <p><h1>Iniciar Sesión</h1></p>
      <?php echo form_open('ControladorUsuario/checklogin'); ?> 
      <?php echo validation_errors(); ?>

        <div class="form_group">
          <?= form_label('Nombre de Usuario','','class="form-control"',['id'=>'username']); ?>
          <br>
          <?= form_input('username','','class="form-control"',['id'=>'username']); ?>
        </div>

        <div class="form_group">
          <?= form_label('Contraseña','', 'class="form-control"'); ?>
          <br>
          <?= form_password('password','', 'class="form-control"'); ?>
        </div>
        <br>

        <?= form_submit('sbm', 'Entrar', 'class="btn btn-primary"'); ?>
      <?= form_close(); ?>
    </div>
    <div class="col-md-7">
      <p><h1>Registrarse</h1></p>
      <?= form_open('ControladorUsuario/crear'); ?>
      <table border="0">
       <tr>

        <td><?= form_input($nom, ['id'=>'nombre']); ?></td>
        <td><?= form_input($ape, ['id'=>'apellidos']); ?></td>
      </tr>
      <tr>
        <td><?= form_input($ciu, ['id'=>'ciudad']); ?></td>
        <td><?= form_dropdown('deporte', $deporte, $deporte1, 'class="form-control"', ['id'=>'deporte']) ?>	</td>
      </tr>
      <tr>
        <td><?= form_input($cor, ['id'=>'correo']); ?></td>
        <td><?= form_input($nomU,['id'=>'nombre_usuario']); ?></td>
      </tr>
      <tr>
        <td><?= form_password($cont, ['id'=>'contrasena']); ?></td>
        <td><?= form_password($rcont, ['id'=>'repetir_contrasena']); ?></td>
      </tr>
    </table>
    <br>

    <p class="help-block">* Indica los campos del formulario que son obligatorios</p>
    <p class="help-block"> La contraseña debe tener por lo menos 1 letra en mayúscula, <br> 1 en minúscula, 1 digito y 1 caracter especial y tener una longitud mayor o igual a 7</p>

    <?= form_submit('sbm', 'Crear', 'class="btn btn-primary"'); ?>
    <?= form_close(); ?>
    <br>

    <?php if (validation_errors()):
    echo validation_errors();
    endif; ?>
    <?php if(isset($usuario)):
    echo $usuario;
    endif;
    ?>
    <?php if(isset($mensaje)):
    echo $mensaje;
    endif;
    ?>
  </div>
  </div>
</div> 
