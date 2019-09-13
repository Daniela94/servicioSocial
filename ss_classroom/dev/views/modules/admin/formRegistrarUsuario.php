<?php 
  $registro = new AdminController();
  $registro -> verificarRegistroUsuarioController();  
  // $registro -> registrarUsuarioController();
  if (isset($_GET['action'])) {
    if($_GET['action'] == "usuarioRegistrado") {
      echo "<br><div class='alert alert-success' role='alert'> Registro exitoso</div>";
    }
  }
?>
<div class="hw-1"></div>
<h4 class="h-subtitle">REGISTRAR USUARIO</h4>
<div class="square-form-cx form-registro ubuntu">
  <form action="" method="POST">
    <div class="row">
      <div class="col">
        <label for="nombreRegistro">Nombre<span></span></label>
        <input type="text" name="nombre" class="input-form" id="nombreRegistro">
      </div>
      <div class="col">
        <label for="">Apellidos</label>
        <input type="text" name="apellidos" class="input-form" id="apellidosRegistro">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="">Número de cuenta</label>
        <input type="" name="numero_cuenta" class="input-form">
      </div>
      <div class="col">
        <label for="">Correo electrónico</label>
        <input type="email" name="email" class="input-form">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label for="">Contraseña</label>
        <input type="password" name="pass" class="input-form" placeholder="Letras, mayúsculas y números.(8)">
      </div>
      <div class="col">
        <label for="">Confirmar contraseña</label>
        <input type="password" name="password" class="input-form" placeholder="Letras, mayúsculas y números.(8)">
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
    <div class="row">
      <div class="col">
        <a href="templateAdmin.php" class="input-form btn form-btn-red">Cancelar</a>
      </div>
      <div class="col">
        <button type="submit" name="enviar" class="input-form btn form-btn-green">Registrar</button>
      </div>
    </div>
  </form>

</div>