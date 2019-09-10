<?php
  $listaProfesores = new AdminController();
  $listaProfesores -> eliminarUsuarioController();
  if (isset($_GET['action'])) {
    # MENSAJE ACTUALIZACIÓN EXITOSA
    if($_GET['action'] == "actualizacionProfesor") {
      echo "<br><br><div class='alert alert-success' role='alert'>Actualizacion exitosa</div>";
    }
    # MENSAJE ELIMINACIÓN EXITOSA
    if($_GET['action'] == "eliminacionProfesor") {
      echo "<br><br><div class='alert alert-success' role='alert'>Eliminación exitosa</div>";
    }
  }
?>
<h4 class="h-subtitle">LISTA DE PROFESORES REGISTRADOS</h4>

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
</div>
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
      $listaProfesores -> listaProfesoresController();
    ?>
  </tbody>
</table>
<script>

  window.onload = function() {
    var url_string = window.location;
    var url = new URL(url_string);
    var btnpg = url.searchParams.get("btnpg");
    var btnElim = document.getElementsByClassName('borrar');
    
    for(var i = 0; i < btnElim.length; i++) {
      btnElim[i].addEventListener('click', function(){
        var id_btnPg = $('.paginate_button.current').attr('data-dt-idx');
        console.log($('[data-dt-idx="'+btnpg+'"]'));
        $('[data-dt-idx="'+id_btnPg+'"]').trigger('click');
        var id_usuario = this.getAttribute('idusuario');
        var id_rol = this.getAttribute('idrol');        
        document.getElementById('btneliminar_').setAttribute('href','templateAdmin.php?action=eliminacionProfesor&idBorrar='+id_usuario+'&idRol='+id_rol+'&btnpg='+id_btnPg);
      });
    };    
    
    //if(btnpg!=null) 
    // $('[data-dt-idx="'+btnpg+'"]').trigger('click');
  };
  
</script>
<!-- <a href="#modal">Eliminar</a> -->
<!-- s -->