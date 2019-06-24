<div class="hw-1"></div>
<h4 class="h-subtitle">REGISTRAR USUARIO</h4>
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
        <label for="">Número de cuenta</label>
        <input type="" name="numero_cuenta" class="input-form">
      </div>
      <div class="col">
        <label for="">Email</label>
        <input type="email" name="email" class="input-form">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="">Contraseña</label>
        <input type="password" class="input-form">
      </div>
      <div class="col">
        <label for="">Confirmar contraseña</label>
        <input type="password" name="password" class="input-form">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="">Rol</label>
        <select name="rol" class="input-form">Tipo de usuario
          <option value="1">Administrador</option>
          <option value="2">Profesor</option>
          <option value="3">Estudiante</option>
        </select>
      </div>
    </div>
    <input type="submit" name="enviar" value="Registrar" class="input-form form-btn-green">
  </form>

</div>
<br>
<br>
<br>
<br>


<?php 
  $registro = new Controller();
  $registro -> registrarUsuarioController();
?>