<?php

foreach ($datos as $dato) {

  $id_usuario = $dato->id_usuario;

  $nom = array(
          'name'        => 'nombre',
          'value'       => $dato->nombre,
          'placeholder' =>'Nombre del entrenamiento',
          'class'       => 'form-control',
        );

  $dur = array(
          'name'        => 'duracion',
          'value'       => $dato->duracion,
          'placeholder' =>'Duración en minutos',
          'class'       => 'form-control',
        );

  $cal = array(
          'name'        => 'calorias_perdidas',
          'value'       => $dato->calorias_perdidas,
          'placeholder' =>'Calorías pérdidas',
          'class'       => 'form-control',
        );

  $lug = array(
          'name'        => 'lugar',
          'value'       => $dato->lugar,
          'placeholder' =>'Lugar',
          'class'       => 'form-control',
        );

  $fec = array(
          'name'        => 'fecha',
          'value'       => $dato->fecha,
          'placeholder' =>'Fecha',
          'class'       => 'form-control',
        );
}

$id=$_GET['itemid'];

?>

<div class='container'>
  <div class="row"> 
    <div class="col-md-5 col-md-offset-3">
      <p><h1>Editar Entrenamiento</h1></p>
      <?php echo form_open("/Controlador_entrenamiento/editar?itemid=$id"); ?> 
      <?php echo validation_errors(); ?>
          <td><?= form_hidden('id_usuario', $id_usuario, ['id'=>'id_usuario']); ?></td>
          <br>
          <td><?= form_input($nom, ['id'=>'nombre']); ?></td>
          <br>
          <td><?= form_input($dur, ['id'=>'duracion']); ?></td>
          <br>
          <td><?= form_input($cal, ['id'=>'calorias_perdidas']); ?></td>
          <br>
          <td><?= form_input($lug, ['id'=>'lugar']); ?></td>
          <br>
          <td><?= form_input($fec, ['id'=>'fecha']); ?></td>
          <br>
        <?= form_submit('sbm', 'Editar', 'class="btn btn-primary"'); ?>
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
