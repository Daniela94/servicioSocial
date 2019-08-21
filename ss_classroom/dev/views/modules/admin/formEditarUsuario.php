<div class="hw-1"></div>
<h4 class="h-subtitle">EDITAR USUARIO</h4>
<div class="square-form-cx form-registro ubuntu">  
<?php 
  $editarUsuario = new AdminController();
  $editarUsuario -> editarUsuarioController();  
?>
</div>
<?php
  echo "<br /><br /><br />";
  $editarUsuario -> actualizarUsuarioController();
?>
