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
      $listaProfesores -> eliminarProfesorController();
    ?>
  </tbody>
</table>

<?php
  if (isset($_GET['action'])) {
    if($_GET['action'] == "actualizacion") {
      echo "Actualización exitosa";
    }
  }
?>