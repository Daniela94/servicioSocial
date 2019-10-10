<script>
  var action = localStorage.getItem('action');
</script>
<?php 
  $registro = new ProfesorController();
  $registro -> registrarTareaController();
  $action = '<script>'.
              'var alertRegistro = \'<br><div class="alert alert-success  alert-dismissible fade show" role="alert">Registro exitoso <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>\';'.
              'var alertError = \'<br><div class="alert alert-danger  alert-dismissible fade show" role="alert">Error al registrar<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>\';'.
              'if(action=="registrarTarea"){'.
                'document.write(alertRegistro);'.
                'document.getElementsByClassName("close")[0].addEventListener("click",function(){localStorage.removeItem("action")})'.
              '}'.
              'if(action=="error"){'.
                'document.write(alertError);'.
                'document.getElementsByClassName("close")[0].addEventListener("click",function(){localStorage.removeItem("action")})'.
              '} 
              window.addEventListener("unload", function(event) {
                localStorage.removeItem("action");
              });'.
            '</script>';
  echo $action;
?>
<div class="hw-1"></div>
<h4 class="h-subtitle">REGISTRAR TAREA</h4>
<div class="square-form-cx form-registro ubuntu">
<?php
  setlocale(LC_TIME, 'es_ES.UTF-8');
  date_default_timezone_set('America/Mexico_City');
  $fecha_publicacion = date("Y-m-d H:i");
  // echo $fecha_publicacion;
  // die();

  $default_local_date = ucwords(utf8_encode(strftime("%a %d %b, %Y a las %H:%M")));
  $date_connectors_capital = array('A', 'Las');
  $date_connectors_lower = array('a', 'las');
  $local_date = str_replace($date_connectors_capital, $date_connectors_lower, $default_local_date);
?>
  <form action="" method="POST">
    <div class="row">
      <div class="col">
        <label for="">Título</label> <span id="charNum"> / 250</span>
        <input type="text" maxlength = "250" name="titulo" class="input-form" onkeyup="countChars(this)" placeholder="Máximo 250 caracteres">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="">Descripción</label> <span id="charNum"> / 250</span>
        <textarea rows="4" cols="50" maxlength = "250"  name="descripcion" class="input-form" placeholder="Máximo 250 caracteres"></textarea>
        
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="">Fecha de publicación</label>
        <p><?=$local_date?></p>
        <input type="hidden" name="fecha_publicacion" value="<?=$fecha_publicacion?>">
      </div>
      <div class="col">
        <label for="">Fecha de entrega</label>
        <input id="datetimepicker" type="text" name="fecha_entrega" class="input-form dateFrom">
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