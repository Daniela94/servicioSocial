<script>
  var action = localStorage.getItem('action');
</script>
<h4 class="h-subtitle">TAREAS ASIGNADAS</h4>
<?php
$action = '<script>'.
            'var alertSuccess = \'<br><div class="alert alert-success  alert-dismissible fade show" role="alert">Se envió la tarea con exitoso <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>\';'.
            'if(action=="envioExitoso"){'.
              'document.write(alertSuccess);'.
              'document.getElementsByClassName("close")[0].addEventListener("click",function(){localStorage.removeItem("action")})'.
            '}'.
            'window.addEventListener("unload", function(event) {
              localStorage.removeItem("action");
            });'.
          '</script>';
  echo $action;
?>
<table id="table_id" class="table table-lista">
  <thead>
    <tr>
      <th>Título</th>
      <th>Descripción</th>
      <th>Fecha de publicación</th>
      <th>Fecha de entrega</th>
      <th>Profesor</th>
      <th>Status</th>
      <th>Entregar</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $listaTareas = new AlumnoController();
      $listaTareas -> listaTareasAlumnoController();
    ?>
  </tbody>
</table><br>