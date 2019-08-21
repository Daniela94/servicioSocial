<h4 class="h-subtitle">Subir tarea</h4>
<div class="form-calificar">
  <p>Solamente documentos e imágenes.</p>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col">
        <?php
          if (isset($_GET['titulo'])) {
            $id_usuario = $_GET['idUsuario'];
            $id_tarea = $_GET['idTarea'];
            $titulo = $_GET['titulo'];
          }
        ?>
        <label for=""><span class="disabled-color">Tarea:</span> <?=$titulo?></label>
        <input type="file" name="archivo" size="" class="input-form">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <a href="templateAlumno.php?action=misTareas" class="input-form btn form-btn-red">Cancelar</a>
      </div>
      <div class="col">
        <input type="hidden" value="<?=$id_usuario?>" name="idUsuario" class="input-form form-btn-green">
        <input type="hidden" value="<?=$id_tarea?>" name="idTarea" class="input-form form-btn-green">
        <!-- <input type="hidden" value="<?=$titulo?>" name="titulo"> -->
        <input type="submit" value="Subir tarea" name="enviarTarea" class="input-form form-btn-green">
      </div>
    </div>
  </form>
</div>
<br /><br />
<?php 
  $subirTarea = new AlumnoController();
  $subirTarea -> subirTareaAlumnoController();
?>