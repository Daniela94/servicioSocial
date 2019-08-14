<h4 class="h-subtitle">Tareas de los alumnos</h4>
<table class="table table-lista">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Entregable</th>
      <th>Status / Calificación</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $tareasAlumnos = new ProfesorController();
      $tareasAlumnos -> listaTareasAlumnosProfesorController();
    ?>  
  </tbody>
</table>