<br>
<br>
<?php
  $deporte[]='Deporte*';
  foreach ($datos as $dato) {
    $deporte[$dato->nombre]=$dato->nombre;
  }

  $nombre=(isset($nombre)) ? $nombre=$nombre : $nombre='';

  $apellidos=(isset($apellidos)) ? $apellidos=$apellidos : $apellidos='';

  $ciudad=(isset($ciudad)) ? $ciudad=$ciudad : $ciudad='';

  $correo=(isset($correo)) ? $correo=$correo : $correo='';

  $nombre_usuario=(isset($nombre_usuario)) ? $nombre_usuario=$nombre_usuario : $nombre_usuario='';

  $contraseña=(isset($contraseña)) ? $contraseña=$contraseña : $contraseña='';

  $repetir_contraseña=(isset($repetir_contraseña)) ? $repetir_contraseña=$repetir_contraseña : $repetir_contraseña='';

  $deporte1=(isset($deporte1)) ? $deporte1=$deporte1 : $deporte1='';

  

  $nom = array(
          'name'        => 'nombre',
          'value'       => $nombre,
          'placeholder' =>'Nombre*',
          'class'       => 'form-control',
        );

  $ape = array(
          'name'        => 'apellidos',
          'value'       => $apellidos,
          'placeholder' =>'Apellidos*',
          'class'       => 'form-control',
        );

  $ciu = array(
          'name'        => 'ciudad',
          'value'       => $ciudad,
          'placeholder' =>'Ciudad*',
          'class'       => 'form-control',
        );

  $cor = array(
          'name'        => 'correo',
          'value'       => $correo,
          'placeholder' =>'Correo electrónico*',
          'class'       => 'form-control',
        );

    $nomU = array(
          'name'        => 'nombre_usuario',
          'value'       => $nombre_usuario,
          'placeholder' =>'Nombre de Usuario*',
          'class'       => 'form-control',
        );

    $cont = array(
          'name'        => 'contraseña',
          'value'       => $contraseña,
          'placeholder' =>'Contraseña*',
          'class'       => 'form-control',
        );

    $rcont = array(
          'name'        => 'repetir_contrasena',
          'value'       => $repetir_contraseña,
          'placeholder' =>'Repetir Contraseña*',
          'class'       => 'form-control',
        );
?>

<div class='container'>
  <div class="row" style="background: rgba(255, 255, 255, .8)"> 
    <div class="col-md-5">
      <p><h1>Iniciar Sesión</h1></p>
      <?php echo form_open('ControladorUsuario/checklogin'); ?> 
      <?php echo validation_errors(); ?>

        <div class="form-group">
          <?= form_label('Nombre de Usuario*:','','class="form-control"',['id'=>'nombre_usuario']); ?>
          <br>
          <?= form_input('nombre_usuario','','class="form-control"',['id'=>'nombre_usuario']); ?>
        </div>

        <div class="form_group">
          <?= form_label('Contraseña*:','', 'class="form-control"'); ?>
          <br>
          <?= form_password('contraseña','', 'class="form-control"'); ?>
        </div>
        <br>
		    <?php echo anchor('ControladorUsuario/ValidarCorreo', '¿Olvidó su contraseña?'); ?>
		
        <?= form_submit('sbm', 'Entrar', 'class="btn btn-primary"'); ?>
      <?= form_close(); ?>
    </div>

    <div class="col-md-7">
      <p><h1>Registrarse</h1></p>
      <?= form_open('ControladorUsuario/crear'); ?>
        <?php echo validation_errors(); ?>
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
          <td><?= form_password($cont, ['id'=>'contraseña']); ?></td>
          <td><?= form_password($rcont, ['id'=>'repetir_contrasena']); ?></td>
        </tr>
      </table>
      <br>

      <p class="help-block">* Indica los campos del formulario que son obligatorios</p>
      <p class="help-block"> La contraseña debe tener por lo menos 1 letra en mayúscula, <br> 1 en minúscula, 1 digito y 1 caracter especial y tener una longitud mayor o igual a 7</p>

      <?= form_submit('sbm', 'Crear', 'class="btn btn-primary"'); ?>

    <?= form_close(); ?>
    <br>
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
