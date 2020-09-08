<?php
  $editarCalificacion = new ProfesorController();
  $editarCalificacion -> actualizarCalificacionAlumnoProfesorController();
?>
<h4 class="h-subtitle">EDITAR CALIFICACIÓN</h4>
<div class="form-calificar">
  <?php
    $editarCalificacion -> editarCalificacionAlumnoProfesorController();
  ?>
</div>
<br /><br /><br />