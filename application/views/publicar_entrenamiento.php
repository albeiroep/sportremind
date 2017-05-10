<?php

  $nombre=(isset($nombre)) ? $nombre=$nombre : $nombre='';

  $duracion=(isset($duracion)) ? $duracion=$duracion : $duracion='';

  $calorias_perdidas=(isset($calorias_perdidas)) ? $calorias_perdidas=$calorias_perdidas : $calorias_perdidas='';

  $lugar=(isset($lugar)) ? $lugar=$lugar : $lugar='';

  $fecha=(isset($fecha)) ? $fecha=$fecha : $fecha='';

  $imagen=(isset($imagen)) ? $imagen=$imagen : $imagen='';  

  $nom = array(
          'name'        => 'nombre',
          'value'       => $nombre,
          'placeholder' =>'Nombre del entrenamiento',
          'class'       => 'form-control',
        );

  $dur = array(
          'name'        => 'duracion',
          'value'       => $duracion,
          'placeholder' =>'Duración en minutos',
          'class'       => 'form-control',
        );

  $cal = array(
          'name'        => 'calorias_perdidas',
          'value'       => $calorias_perdidas,
          'placeholder' =>'Calorías pérdidas',
          'class'       => 'form-control',
        );

  $fec = array(
          'name'        => 'fecha',
          'value'       => $fecha,
          'placeholder' =>'Fecha',
          'class'       => 'form-control',
        );

  $lug = array(
          'name'        => 'lugar',
          'value'       => $lugar,
          'placeholder' =>'Lugar',
          'class'       => 'form-control',
        );

  $img = array(
          'name'        => 'imagen',
          'value'       => $imagen,
          'placeholder' =>'Imagen',
          'class'       => 'form-control',
        );

  $id_usuario=$_GET['itemid'];
?>

<div class='container'>
  <div class="row"> 
    <div class="col-md-5 col-md-offset-3">
      <p><h1>Publicar Entrenamiento</h1></p>
      <?php echo form_open("/Controlador_entrenamiento/publicar_entrenamiento?itemid=$id_usuario"); ?> 
      <?php echo validation_errors(); ?>

          <td><?= form_input($nom, ['id'=>'nombre']); ?></td>
          <br>
          <td><?= form_input($dur, ['id'=>'duracion']); ?></td>
          <br>
          <td><?= form_input($cal, ['id'=>'calorias_perdidas']); ?></td>
          <br>
          <td><?= form_input($fec, ['id'=>'fecha']); ?></td>
          <br>
          <td><?= form_input($lug, ['id'=>'lugar']); ?></td>
          <br>
          <td><?= form_input($img, ['id'=>'imagen']); ?></td>
		      <br>
        <input type="submit" value="Publicar" class="btn btn-primary" /></a>
      <?= form_close(); ?>
    </div>

    <br>
    <?php if(isset($entrenamiento)):
    echo $entrenamiento;
    endif;
    ?>
    <?php if(isset($mensaje)):
    echo $mensaje;
    endif;
    ?>
    
  </div>
  </div>
</div> 
