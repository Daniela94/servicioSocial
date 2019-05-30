<?php
  include_once 'dev/config.path.php'; //Ruta relativa
  include_once (INC_PATH.'header.php');
?>

<div class="hw-100 img-bg-board3"></div>
<div class="navbar_">
  <!-- <a href="#" class="left logo-txt">ssClassroom</a> -->
  <a href="formRegistrarProfesor.php" class="btn btn-opc-lista"><i class="fas fa-plus"></i> Registrar Profesor</a>
  <ul class="nav_ flex-right">
    <li><i class="fas fa-user"></i></li>
    <li>Administrador</li>
  </ul>  
</div>
<div class="container-fluid">
  <!-- <div class="flex-right">
    <a href="formRegistrarProfesor.php" class="btn btn-opc-lista"><i class="fas fa-plus"></i> Registrar Profesor</a>
  </div> -->
  <h3 class="flex-center_x h-title-white">Lista de Profesores</h3>
  <table class="table-light table-style">
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
        <td>3125955670</td>
        <td>Informática I</td>
        <td>
          <a href=""><i class='blue fas fa-edit'></i></a>
          <a href=""><i class='red fas fa-trash-alt'></i></a>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<?php 
  include_once (INC_PATH.'footer.php');
?>