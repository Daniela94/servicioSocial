<script>
  var action = localStorage.getItem('action');
</script>
<?php 
  $registro = new AdminController();
  $registro -> verificarRegistroUsuarioController();  
  $action = '<script>'.
              'var alertRegistro = \'<br><div class="alert alert-success  alert-dismissible fade show" role="alert">Registro exitoso <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>\';'.
              'var alertError = \'<br><div class="alert alert-danger  alert-dismissible fade show" role="alert">Error al registrar<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>\';'.
              'if(action=="usuarioRegistrado"){'.
                'document.write(alertRegistro);'.
                'document.getElementsByClassName("close")[0].addEventListener("click",function(){localStorage.removeItem("action")})'.
              '}'.
              'if(action=="error"){'.
                'document.write(alertError);'.
                'document.getElementsByClassName("close")[0].addEventListener("click",function(){localStorage.removeItem("action")})'.
              '} 
              window.addEventListener("unload", function(event) {
                localStorage.removeItem("action");
              });'.
            '</script>';
  echo $action;
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
        <input type="password" name="pass" id="pass" class="input-form" placeholder="Mayúsculas, minúsculas y números.">
      </div>
      <div class="col">
        <label for="">Confirmar contraseña</label>
        <input type="password" name="password" id="password" class="input-form" placeholder="Mayúsculas, minúsculas y números.">
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