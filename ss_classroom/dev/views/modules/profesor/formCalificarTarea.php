<?php
  $calificar = new ProfesorController();
  $calificar -> calificarTareaAlumnoProfesorController();
  if (isset($_GET['action'])) {
    # MENSAJE ACTUALIZACIÓN EXITOSA
    if ($_GET['action'] == "tareaCalificada") {
      echo "Tarea calificada con exito";
    }
  }
?>
<h4 class="h-subtitle">Calificar tarea</h4>
<div class="form-calificar">
  <p>Del 1 al 10 donde 10 es el 100% del valor de la tarea.</p>
  <?php
    if(isset($_GET['titulo'])) {
      $titulo = $_GET['titulo'];
      $id_tarea = $_GET['idTarea'];
    }
  ?>
  <form method="POST">
    <div class="row">
      <div class="col">
        <label for=""><?=$titulo?></label>
      </div>
      <div class="col">
        <input type="hidden" name="idTarea" value="<?=$id_tarea?>">
        <input type="number" step="any" min="0" max="10" class="input-form" name="calificacion" placeholder="10.0">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <a href="templateProfesor.php?titulo=<?=$titulo?>&idTarea=<?=$id_tarea?>&action=tareasAlumnos" class="input-form btn form-btn-red">Cancelar</a>
      </div>
      <div class="col">
        <input type="submit" value="Calificar" name="calificar" class="input-form form-btn-green">
      </div>
    </div>
  </form>
</div>