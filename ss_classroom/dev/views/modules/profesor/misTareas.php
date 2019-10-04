<script>
  var action = localStorage.getItem('action');
</script>
<?php
  $listaTareas = new ProfesorController();
  $listaTareas -> eliminarTareaProfesorController();
  $action = '<script>'.
              'var alertEliminar = \'<br><div class="alert alert-success  alert-dismissible fade show" role="alert">Eliminación exitosa <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>\';'.
              'var alertActualizacion = \'<br><div class="alert alert-success  alert-dismissible fade show" role="alert">Actualización exitosa <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>\';'.
              'if(action=="eliminacionTarea"){'.
                'document.write(alertEliminar);'.
                'document.getElementsByClassName("close")[0].addEventListener("click",function(){localStorage.removeItem("action")})'.
              '}'.
              'if(action=="actualizacionTarea"){'.
                'document.write(alertActualizacion);'.
                'document.getElementsByClassName("close")[0].addEventListener("click",function(){localStorage.removeItem("action")})'.
              '}
              window.addEventListener("unload", function(event) {
                localStorage.removeItem("action");
              });'.
            '</script>';
  echo $action;
?>
<h4 class="h-subtitle">TAREAS REGISTRADAS</h4>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar tarea</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Seguro que desea eliminar esta tarea?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <a href="" class="btn btn-danger" id="btneliminar_">Eliminar</a>
      </div>
    </div>
  </div>
</div>
<table id="table_id" class="table table-lista">
  <thead>
    <tr>
      <th>Título</th>
      <th>Descripción</th>
      <th>Fecha de publicación</th>
      <th>Fecha de entrega</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $listaTareas -> listaTareasProfesorController();
    ?>
  </tbody>
</table>
<script>
  window.onload = function() {
    var btnElim = document.getElementsByClassName('borrar');
    
    for(var i = 0; i < btnElim.length; i++) {
      btnElim[i].addEventListener('click', function(){
        var id_usuario = this.getAttribute('idBorrar');   
        document.getElementById('btneliminar_').setAttribute('href','templateProfesor.php?action=eliminacionTarea&idBorrar='+id_usuario);
      });
    };    
  };
</script>