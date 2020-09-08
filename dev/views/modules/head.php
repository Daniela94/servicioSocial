<?php
  require_once MODEL_PATH.'EnlacesAdminModel.php';
  require_once MODEL_PATH.'EnlacesProfesorModel.php';
  require_once MODEL_PATH.'Conexion.php';
  require_once MODEL_PATH.'Crud.php';
  require_once MODEL_PATH.'CrudAdminModel.php';
  require_once MODEL_PATH.'CrudProfesorModel.php';
  require_once MODEL_PATH.'CrudAlumnoModel.php';
  require_once CONTROLLER_PATH.'Controller.php';
  require_once CONTROLLER_PATH.'AdminController.php';
  require_once CONTROLLER_PATH.'ProfesorController.php';
  require_once CONTROLLER_PATH.'AlumnoController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- FONTAWESOME CSS -->
  <link rel="stylesheet" href="<?php echo DIR_VIEWS;?>assets/fonts/fontawesome/css/all.min.css">
  <!-- BOOTSTRAP css -->
  <link rel="stylesheet" href="<?php echo DIR_VIEWS;?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Mi css -->
  <link rel="stylesheet" href="<?php echo DIR_VIEWS;?>css/grid.css">
  <link rel="stylesheet" href="<?php echo DIR_VIEWS;?>css/miestilo.css">
  <link rel="shortcut icon" href="<?php echo DIR_VIEWS;?>assets/img/crud-logo.png" type="image/x-icon">
  <!-- jQuery -->
  <script src="<?php echo DIR_VIEWS;?>assets/js/jquery-3.4.1.min.js"></script>
  <!-- DataTables -->
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script> -->

  <!-- <script type="text/javascript" src="<?php
  echo DIR_VIEWS;?>assets/dataTables/jquery.dataTables.min.js"></script> -->

  <link rel="stylesheet" type="text/css" href="<?php echo DIR_VIEWS;?>assets/dataTables/datatables.min.css"/>

  <script type="text/javascript" src="<?php echo DIR_VIEWS;?>assets/dataTables/datatables.js"></script>

  <script>
    $(window).on('load', function () {
      $('#table_id').DataTable({
        "language": {
          "url": "<?php echo DIR_VIEWS;?>assets/dataTables/Spanish.json"
        }
      });
    });
  </script>

  <title>ssClassroom</title>
</head>
<body>