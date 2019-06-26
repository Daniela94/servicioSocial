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
    ?>
  </tbody>
</table>