<?php
  $listaAdmin = new AdminController();
  $listaAdmin -> eliminarUsuarioController();
  if (isset($_GET['action'])) {
    # MENSAJE ELIMINACIÓN EXITOSA
    if($_GET['action'] == "eliminacionAdmin") {
      echo "<br><div class='alert alert-success' role='alert'>Eliminación exitosa</div>";
    }
  }
?>
<h4 class="h-subtitle">LISTA DE ADMINISTRADORES REGISTRADOS</h4>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Seguro que desea eliminar a este usuario?
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
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Correo</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $listaAdmin -> listaAdminController();
    ?>
  </tbody>
</table>
<script>
  window.onload = function() {
    var btnElim = document.getElementsByClassName('borrar');
    
    for(var i = 0; i < btnElim.length; i++) {
      btnElim[i].addEventListener('click', function(){
        var id_usuario = this.getAttribute('idusuario');
        var id_rol = this.getAttribute('idrol');        
        document.getElementById('btneliminar_').setAttribute('href','templateAdmin.php?action=eliminacionProfesor&idBorrar='+id_usuario+'&idRol='+id_rol);
      });
    };    
  };
</script>