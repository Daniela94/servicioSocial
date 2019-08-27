<div class="hw-1"></div>
<h4 class="h-subtitle">REGISTRAR TAREA</h4>
<div class="square-form-cx form-registro ubuntu">
<?php
  setlocale(LC_TIME, 'es_ES.UTF-8');

  date_default_timezone_set('America/Mexico_City');
  $fecha_publicacion = date("Y:m:d\TH:i");
  // echo $fecha_publicacion;
  // die();

  $default_local_date = ucwords(utf8_encode(strftime("%a %d %b, %Y a las %H:%M")));
  $date_connectors_capital = array('A', 'Las');
  $date_connectors_lower = array('a', 'las');
  $loca_date = str_replace($date_connectors_capital, $date_connectors_lower, $default_local_date);
?>
  <form action="" method="POST">
    <div class="row">
      <div class="col">
        <label for="">Título</label>
        <input type="text" name="titulo" class="input-form">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="">Descripción</label>
        <textarea rows="4" cols="50" name="descripcion" class="input-form"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="">Fecha de publicación</label>
        <p><?=$loca_date?></p>
        <input type="hidden" name="fecha_publicacion" value="<?=$fecha_publicacion?>">
      </div>
      <div class="col">
        <label for="">Fecha de entrega</label>
        <input type="datetime-local" name="fecha_entrega" class="input-form">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <a href="templateProfesor.php?action=misTareas" class="input-form btn form-btn-red">Cancelar</a>
      </div>
      <div class="col">
        <button type="submit" name="enviar" value="" class="input-form btn form-btn-green">Registrar</button>
      </div>
    </div>
  </form>

</div>
<br>
<br>
<br>
<?php 
  $registro = new ProfesorController();
  $registro -> registrarTareaController();
  if (isset($_GET['action'])) {
    if($_GET['action'] == "ok") {
      echo "Registro exitoso";
    }
  }
?>