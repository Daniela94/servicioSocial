<h4 class="h-subtitle">TAREAS ASIGNADAS</h4>

<table class="table table-lista">
  <thead>
    <tr>
      <th>Título</th>
      <th>Descripción</th>
      <th>Fecha de publicación</th>
      <th>Fecha de entrega</th>
      <th>Profesor</th>
      <th>Status</th>
      <th>Entregar</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $listaTareas = new AlumnoController();
      $listaTareas -> listaTareasAlumnoController();
    ?>
  </tbody>
</table>