<h4 class="h-subtitle">TAREAS REGISTRADAS</h4>

<table class="table table-lista">
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
      $listaTareas = new ProfesorController();
      $listaTareas -> listaTareasProfesorController();
      $listaTareas -> eliminarTareaProfesorController();
    ?>
  </tbody>
</table>
<?php
  if (isset($_GET['action'])) {
    # MENSAJE ACTUALIZACIÓN EXITOSA
    if ($_GET['action'] == "actualizacionTarea") {
      echo "Actualizacion exitosa";
    }
    # MENSAJE ELIMINACIÓN EXITOSA
    if ($_GET['action'] == "eliminacionTarea") {
      echo "Eliminación exitosa";
    }
  }
?>