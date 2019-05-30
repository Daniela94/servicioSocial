<?php
  include_once 'dev/config.path.php'; //Ruta relativa
  include_once (INC_PATH.'header.php');
?>

<div class="hw-100 img-bg-board3"></div>
<div class="navbar_">
  <!-- <a href="#" class="left logo-txt">ssClassroom</a> -->
  <div class="flex left">
    <a href="adminView.php" class="btn btn-danger">Cancelar</a>
  </div>
  <ul class="nav_ flex-right">
    <li><i class="fas fa-user"></i></li>
    <li>Administrador</li>
  </ul>  
</div>
<div class="flex center_x">
  <h2 class="h-mnsj-r crayon-hand">Nuevo(a) Profesor(a)</h2>
</div>
<div class="square-form-cx form-registro ubuntu">
  <form action="" method="POST">
    <div class="row">
      <div class="col">
        <label for="">Nombre</label>
        <input type="text" name="nombre" class="input-form">
      </div>
      <div class="col">
        <label for="">Apellidos</label>
        <input type="text" name="apellidos" class="input-form">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="">Contraseña</label>
        <input type="password" name="password" class="input-form">
      </div>
      <div class="col">
        <label for="">Confirmar contraseña</label>
        <input type="password" name="password" class="input-form">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="">Email</label>
        <input type="text" name="direccion" class="input-form">
      </div>
      <div class="col">
        <label for="">Rol administrador</label>
        <select name="" id="" class="input-form">Tipo de usuario
          <option value="">Profesor</option>
          <option value="">Estudiante</option>
          <option value="">Administrador</option>
        </select>
      </div>
    </div>
    <input type="submit" value="Registrar" class="input-form form-btn-green">
  </form>
</div>

<?php 
  include_once (INC_PATH.'footer.php');
?>