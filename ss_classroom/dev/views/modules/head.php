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
  <!-- Sweetalert -->
  <!-- <link rel="stylesheet" href="<?php echo DIR_VIEWS;?>assets/sweetalert2.min.css"> -->
  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="<?php echo DIR_VIEWS;?>assets/dataTables/jquery.dataTables.min.css"/>
  <!-- Mi css -->
  <link rel="stylesheet" href="<?php echo DIR_VIEWS;?>css/grid.css">
  <link rel="stylesheet" href="<?php echo DIR_VIEWS;?>css/miestilo.css">
  <link rel="shortcut icon" href="<?php echo DIR_VIEWS;?>assets/img/crud-logo.png" type="image/x-icon">
  <!-- jQuery -->
  <script src="<?php echo DIR_VIEWS;?>assets/js/jquery-3.4.1.min.js"></script>
  <!-- DataTables JS -->
  <script type="text/javascript" src="<?php echo DIR_VIEWS;?>assets/dataTables/jquery.dataTables.min.js"></script>
  <script>
    $('[data-dt-idx="2"]').trigger('click');
    var url_string = window.location;
    var url = new URL(url_string);
    var btnpg = url.searchParams.get("btnpg");
    //if(btnpg!=null) 
      //console.log($('[data-dt-idx="'+btnpg+'"]'));
    $(window).on('load', function () {
      $('#table_id').dataTable({
        "language": {
          "url": "<?php echo DIR_VIEWS;?>assets/dataTables/Spanish.json"
        }
      });
      //$('[data-dt-idx="'+btnpg+'"]').trigger('click');
    });
  </script>

  <title>ssClassroom</title>
</head>
<body>