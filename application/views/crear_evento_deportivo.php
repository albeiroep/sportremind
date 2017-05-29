<br>
<br>
<?php

  $nombre_evento=(isset($nombre_evento)) ? $nombre_evento=$nombre_evento : $nombre_evento='';

  $temperatura_esperada=(isset($temperatura_esperada)) ? $temperatura_esperada=$temperatura_esperada : $temperatura_esperada='';

  $lugar=(isset($lugar)) ? $lugar=$lugar : $lugar='';

  $fecha=(isset($fecha)) ? $fecha=$fecha : $fecha='';

  $direccion_url=(isset($direccion_url)) ? $direccion_url=$direccion_url: $direccion_url='';

  $categoria=(isset($categoria)) ? $categoria=$categoria : $categoria='';  

  $nom = array(
          'name'        => 'nombre_evento',
          'value'       => $nombre_evento,
          'placeholder' =>'Nombre del evento*',
          'class'       => 'form-control',
        );

  $tem = array(
          'name'        => 'temperatura_esperada',
          'value'       => $temperatura_esperada,
          'placeholder' =>'temperatura_esperada*',
          'class'       => 'form-control',
        );

  $lug = array(
          'name'        => 'lugar',
          'value'       => $lugar,
          'placeholder' =>'Lugar*',
          'class'       => 'form-control',
        );

  $fec = array(
          'name'        => 'fecha',
          'value'       => $fecha,
          'placeholder' =>'Fecha (yyyy/mm/dd)*',
          'class'       => 'form-control datepicker',
        );

  $dir = array(
          'name'        => 'direccion_url',
          'value'       => $direccion_url,
          'placeholder' =>'Direccion Url*',
          'class'       => 'form-control',
        );

  $categ = array(
          'name'        => 'categoria',
          'value'       => $categoria,
          'placeholder' =>'categoria*',
          'class'       => 'form-control',
        );

?>

<div class="container" style="background: rgba(255, 255, 255, .8);">
  <div class="row"> 
    <div class="col-md-5 col-md-offset-3">
      <p><h1>Crear Evento Deportivo</h1></p>
      <?php echo form_open_multipart("/Controlador_evento_deportivo/crear_evento_deportivo"); ?> 
      <?php echo validation_errors(); ?>
         
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
          <input type="submit" value="crear" class="btn btn-primary" /></a>
          <br>
          <p class="help-block">* Indica los campos del formulario que son obligatorios</p>
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