<h4 class="h-subtitle">LISTA DE TAREAS REGISTRADAS</h4>

<table id="table_id" class="table table-lista">
  <thead>
    <tr>
      <th>Título</th>
      <th>Descripción</th>
      <th>Fecha de publicación</th>
      <th>Fecha límite de entrega</th>
      <th>Profesor</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $listaTareas = new AdminController();
      $listaTareas -> listaTareasController();
    ?>
  </tbody>
</table>