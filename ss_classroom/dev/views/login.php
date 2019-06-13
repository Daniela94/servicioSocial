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
  <div class="square-form-cx form-index ubuntu">
    <form id="form-login">
      <label for="">Número de cuenta / Correo</label>
      <input type="text" name="usuario" id="" class="input-form">
      <label for="password">Contraseña</label>
      <input type="password" name="password" class="input-form">
      <!-- Botón -->
      <button type="button" id="btn-login" class="input-form form-btn-green">Iniciar sesión</button>
      <label id="error-login"></label>
      <!-- <span>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></span> -->
    </form>
  </div>
</section>
<!-- / SECTION 1 Formulario de ingreso -->

<script>
  $("#btn-login").click(function(event) {
    event.preventDefault();
    var formulario = document.getElementById("form-login");
    var formData = new FormData(formulario);
    var errorLogin = document.getElementById("error-login");
    console.log(formulario.elements);
    if (formulario.elements[0].value == ""){
      errorLogin.innerHTML = "El correo / usuario es requerido";
      return 0;
    }
    if (formulario.elements[1].value == ""){
      errorLogin.innerHTML = "La contraseña es requerida";
      return 0;
    }

    $.ajax({
      url: 'login.php',
      data: formData,
      type: 'POST',
      contentType: false,
      processData: false,
      success: function(ans){
        console.log(ans);
      }
    })
  })
</script>
<?php
  include_once (MODULES_PATH.'footer.php');
?>