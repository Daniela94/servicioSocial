<div class="hw-1"></div>
<h4 class="h-subtitle">REGISTRAR TAREA</h4>
<div class="square-form-cx form-registro ubuntu">
  <form action="" method="POST">
    <div class="row">
      <div class="col">
        <label for="">Título</label>
        <input type="text" name="titulo" class="input-form">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="">Descripción</label>
        <textarea rows="4" cols="50" name="descripcion" class="input-form"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="">Fecha de publicación</label>
        <input type="date" name="fecha_publicacion" class="input-form">
      </div>
      <div class="col">
        <label for="">Fecha de entrega</label>
        <input type="date" name="fecha_entrega" class="input-form">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <a href="templateProfesor.php" class="input-form btn form-btn-red">Cancelar</a>
      </div>
      <div class="col">
        <input type="submit" name="enviar" value="Registrar" class="input-form form-btn-green">
      </div>
    </div>
  </form>

</div>
<br>
<br>
<br>
<br>


<?php 
  $registro = new ProfesorController();
  $registro -> registrarTareaController();
  if (isset($_GET['action'])) {
    if($_GET['action'] == "ok") {
      echo "Registro exitoso";
    }
  }
?>