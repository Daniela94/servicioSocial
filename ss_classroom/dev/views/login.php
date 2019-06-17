<?php
  include_once (MODULES_PATH.'head.php');
?>
<header class="_header flex">
  <nav class="ubuntu flex center_y">
    <!-- <h3 class="titulo-crud">CRUD</h3> -->
  </nav>
</header>

<!-- SECTION 1 Formulario de ingreso -->
<section class="school-bg">
  <div class="flex center_x">
    <h2 class="h-mnsj-i crayon-hand">Bienvenido(a) al sistema</h2>
  </div>
  <div class="square-form-login form-index ubuntu">
    <form id="form-login" action="./dev/validarLogin.php" method="POST">
      <label for="">Número de cuenta / Correo</label>
      <input type="text" name="usuario" id="" class="input-form">
      <label for="password">Contraseña</label>
      <input type="password" name="password" class="input-form">
      <!-- Botón -->
      <button type="submit" class="input-form form-btn-green" name="entrar">Iniciar sesión</button>
      <label id="error-login"></label>
      <!-- <span>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></span> -->
    </form>
  </div>
</section>
<!-- / SECTION 1 Formulario de ingreso -->


<?php
  include_once (MODULES_PATH.'footer.php');
?>