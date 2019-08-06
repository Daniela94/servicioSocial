<h4 class="h-subtitle">LISTA DE PROFESORES REGISTRADOS</h4>

<table class="table table-lista">
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
      $listaProfesores = new AdminController();
      $listaProfesores -> listaProfesoresController();
      $listaProfesores -> eliminarUsuarioController();
    ?>
  </tbody>
</table>
<?php
  if (isset($_GET['action'])) {
    # MENSAJE ACTUALIZACIÓN EXITOSA
    if($_GET['action'] == "actualizacionProfesor") {
      echo "Actualización exitosa";
    }
    # MENSAJE ELIMINACIÓN EXITOSA
    if($_GET['action'] == "eliminacionProfesor") {
      echo "Eliminación exitosa";
    }
  }
?>