<script>
  var action = localStorage.getItem('action');
</script>
<?php
  $tareasAlumnos = new ProfesorController();
  $tareasAlumnos -> rechazarTareaAlumnoProfesorController();
  $action = '<script>'.
              'var alertSuccess = \'<br><div class="alert alert-success  alert-dismissible fade show" role="alert">Tarea calificada con éxito <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>\';'.
              'var alertUpdate = \'<br><div class="alert alert-success  alert-dismissible fade show" role="alert">Tarea actualizada con éxito <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>\';'.
              'var alertReject = \'<br><div class="alert alert-danger  alert-dismissible fade show" role="alert">Tarea rechazada <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>\';'.
              'if(action=="tareaCalificada"){'.
                'document.write(alertSuccess);'.
                'document.getElementsByClassName("close")[0].addEventListener("click",function(){localStorage.removeItem("action")})'.
              '}'.
              'if(action=="calificacionActualizada"){'.
                'document.write(alertUpdate);'.
                'document.getElementsByClassName("close")[0].addEventListener("click",function(){localStorage.removeItem("action")})'.
              '}'.
              'if(action=="tareaRechazada"){'.
                'document.write(alertReject);'.
                'document.getElementsByClassName("close")[0].addEventListener("click",function(){localStorage.removeItem("action")})'.
              '}'. 
              'window.addEventListener("unload", function(event) {
                localStorage.removeItem("action");
              });'.
            '</script>';
  echo $action;

  $titulo = "";

  // if (isset($_GET['action'])) {
  //   # MENSAJE CALIFICACIÓN EXITOSA
  //   if ($_GET['action'] == "tareaCalificada") {
  //     echo "<br><div class='alert alert-success alert-dismissible fade show' role='alert'>Tarea calificada con éxito <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  //     <span aria-hidden='true'>&times;</span>
  //   </button></div>";
  //   }
  //   # MENSAJE ACTUALIZACIÓN EXITOSA
  //   if ($_GET['action'] == "tareaActualizada") {
  //     echo "<br><div class='alert alert-success alert-dismissible fade show' role='alert'>Tarea actualizada con éxito <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  //     <span aria-hidden='true'>&times;</span>
  //   </button></div>";
  //   }
  //   # MENSAJE TAREA RECHAZADA
  //   if ($_GET['action'] == "tareaRechazada") {
  //     echo "<br><div class='alert alert-danger alert-dismissible fade show' role='alert'>Tarea rechazada <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  //     <span aria-hidden='true'>&times;</span>
  //   </button></div>";
  //   }
  //   #  MENSAJE CALIFICACIÓN ACTUALIZADA
  //   if($_GET['action'] == "calificacionActualizada") {
  //     echo "<br><div class='alert alert-success alert-dismissible fade show' role='alert'>Calificación actualizada con éxito <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  //     <span aria-hidden='true'>&times;</span>
  //   </button></div>";
  //   }
  // }
?>
<h4 class="h-subtitle">Tarea de los alumnos</h4>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rechazar tarea</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Seguro que desea rechazar esta tarea?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <a href="" class="btn btn-danger" id="btnrechazar_">Rechazar</a>
      </div>
    </div>
  </div>
</div>
<table id="table_id" class="table table-lista">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Entregable</th>
      <th>Status / Calificación</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $tareasAlumnos -> listaTareasAlumnosProfesorController();
    ?>  
  </tbody>
</table>
<script>
  window.onload = function() {
    var btnRechazar = document.getElementsByClassName('rechazar');
    
    for(var i = 0; i < btnRechazar.length; i++) {
      btnRechazar[i].addEventListener('click', function(){
        var id_tarea = this.getAttribute('idTarea');
        var titulo = this.getAttribute('titulo');
        document.getElementById('btnrechazar_').setAttribute('href','templateProfesor.php?action=tareasAlumnos&rechazarTarea&titulo='+titulo+'&idTarea='+id_tarea);
      });
    };    
  };
</script>