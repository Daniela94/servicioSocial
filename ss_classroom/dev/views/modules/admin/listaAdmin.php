<h4 class="h-subtitle">LISTA DE ADMINISTRADORES REGISTRADOS</h4>

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
      $listaAdmin = new AdminController();
      $listaAdmin -> listaAdminController();
      $listaAdmin -> eliminarUsuarioController();
    ?>
  </tbody>
</table>
<?php
  if (isset($_GET['action'])) {
    # MENSAJE ELIMINACIÓN EXITOSA
    if($_GET['action'] == "eliminacionAdmin") {
      echo "Eliminación exitosa";
    }
  }
?>