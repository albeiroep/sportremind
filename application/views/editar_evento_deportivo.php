<?php

foreach ($misEventos as $miEvento) {

  $nom = array(
          'name'        => 'nombre_evento',
          'value'       => $miEvento->nombre_evento,
          'placeholder' =>'Nombre del evento*',
          'class'       => 'form-control',
        );

  $tem = array(
          'name'        => 'temperatura_esperada',
          'value'       => $miEvento->temperatura_esperada,
          'placeholder' =>'temperatura_esperada*',
          'class'       => 'form-control',
        );

  $lug = array(
          'name'        => 'lugar',
          'value'       => $miEvento->lugar,
          'placeholder' =>'Lugar*',
          'class'       => 'form-control',
        );

  $fec = array(
          'name'        => 'fecha',
          'value'       => $miEvento->fecha,
          'placeholder' =>'Fecha (yyyy/mm/dd)*',
          'class'       => 'form-control datepicker',
        );

  $dir = array(
          'name'        => 'direccion_url',
          'value'       => $miEvento->direccion_url,
          'placeholder' =>'Direccion Url*',
          'class'       => 'form-control',
        );

  $categ = array(
          'name'        => 'categoria',
          'value'       => $miEvento->categoria,
          'placeholder' =>'categoria*',
          'class'       => 'form-control',
        );
}

$id=$_GET['itemid'];

?>

<div class="container" style="background: rgba(255, 255, 255, .8);">
  <div class="row"> 
    <div class="col-md-5 col-md-offset-3">
      <p><h1>Editar Evento Deportivo</h1></p>
      <?php echo form_open("/Controlador_evento_deportivo/editar?itemid=$id"); ?> 
      <?php echo validation_errors(); ?>
          <td><?= form_hidden('id', $id, ['id'=>'id']); ?></td>
          <br>
          <td><?= form_input($nom, ['id'=>'nombre_evento']); ?></td>
          <br>
          <td><?= form_input($tem, ['id'=>'temperatura_esperada']); ?></td>
          <br>
          <td><?= form_input($lug, ['id'=>'lugar']); ?></td>
          <br>
          <td><?= form_input($fec, ['id'=>'fecha']); ?></td>
          <br>
          <td><?= form_input($dir, ['id'=>'direccion_url']); ?></td>
          <br>
          <td><?= form_input($categ, ['id'=>'categoria']); ?></td>
          <br>
          <?= form_submit('sbm', 'Editar', 'class="btn btn-primary"'); ?>
      <?= form_close(); ?>
    </div>

    <br>

    <?php if(isset($evento)):
          echo $evento;
          endif;
    ?>
    <?php if(isset($mensaje)):
          echo $mensaje;
          endif;
    ?>
    
  </div>
  </div>
</div> 