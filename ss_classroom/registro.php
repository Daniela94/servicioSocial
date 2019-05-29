<?php
  include_once 'dev/config.path.php'; //Ruta relativa
  include_once (INC_PATH.'header.php');
?>
<header class="_header flex">
  <nav class="ubuntu flex center_y">
    <!-- <h3 class="titulo-crud">CRUD</h3> -->
  </nav>
</header>

<section class="section-form school-bg">
  <div class="flex center_x">
    <h2 class="h-mnsj-r crayon-hand">Regístrate</h2>
  </div>
  <div class="square-form-cx form-registro ubuntu">
    <form action="">
      <label for="">Nombre</label>
      <input type="text" class="input-form">
      <label for="">Apellidos</label>
      <input type="text" class="input-form">
      <label for="">No. de cuenta</label>
      <input type="number" name="" id="" class="input-form">
      <label for="">Contraseña</label>
      <input type="password" class="input-form">
      <label for="">Confirmar contraseña</label>
      <input type="password" class="input-form">
      <input type="button" value="Registrarme" class="input-form form-btn-green">
      <span>¿Ya tienes cuentas? <a href="index.php">Inicia sesión</a></span>
    </form>
  </div>
</section>

<?php
  include_once 'dev/config.path.php'; //Ruta relativa
  include_once (INC_PATH.'inc/footer.php');
?>