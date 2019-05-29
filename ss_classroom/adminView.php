<?php
  include_once 'dev/config.path.php'; //Ruta relativa
  include_once (INC_PATH.'header.php');
?>

<div class="hw-100 img-bg-personas"></div>
<nav class="navbar-light">
  <ul>Agregar Profesores</ul>
</nav>
<div class="container-fluid">
  <h3 class="flex-center_x h-title">Lista de Profesores</h3>
  <table>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Correo Electrónico</th>
        <th>Teléfono</th>
        <th>Materia</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Daniela</td>
        <td>Rodríguez</td>
        <td>daniela@mail.com</td>
        <td>312111111111</td>
        <td>Informática I</td>
        <td>Editar | Eliminar</td>
      </tr>
    </tbody>
  </table>
</div>

<?php 
  include_once (INC_PATH.'footer.php');
?>