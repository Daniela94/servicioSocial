<div class="hw-1"></div>
<h4 class="h-subtitle">EDITAR USUARIO</h4>
<div class="square-form-cx form-registro ubuntu">  
  <?php 
    $editarUsuario = new AdminController();
    $editarUsuario -> editarUsuarioController();

    if (isset($_GET['action'])) {
      if($_GET['action'] == "ok") {
        echo "Actualización exitosa";
      }
    }
  ?>
</div>
<br>
<br>
<br>
<br>

