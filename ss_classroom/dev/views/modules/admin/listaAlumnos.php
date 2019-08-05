<h4 class="h-subtitle">LISTA DE ALUMNOS REGISTRADOS</h4>
<table class="table table-lista">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Correo</th>
      <th>Número de cuenta</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $listaAlumnos = new AdminController();
    $listaAlumnos -> listaAlumnosController();
  ?>
  </tbody>
</table>
<?php
  if (isset($_GET['action'])) {
    # MENSAJE ACTUALIZACIÓN EXITOSA
    if($_GET['action'] == "actualizacionAlumno") {
      echo "Actualización exitosa";
    }
    # MENSAJE ELIMINACIÓN EXITOSA
    if($_GET['action'] == "eliminacionAlumno") {
      echo "Eliminación exitosa";
    }
  }
?>