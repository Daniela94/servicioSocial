<?php 
 
  class AlumnoController {
    # Interacción del alumno con los enlaces de la página
    # --------------------------------------------------
    public function enlacesVistasAlumnoController() {
      if (isset($_GET['action'])) {
        $enlacesController = $_GET['action'];

        $respuesta = EnlacesAlumnoModel::enlacesVistasAlumnoModel($enlacesController);

        include $respuesta;
      } else {
        echo "<h2 class='h-title'>Bienvenido(a) al SISTEMA ssClassroom</h2>";
      }
    }
    # Mostrar lista de tareas
    # ---------------------------------------------------------------
    public function listaTareasAlumnoController() {
      // print_r($_SESSION);
      $id_usuario = $_SESSION['id_usuario'];
      // var_dump($id_usuario);
      $respuesta = CrudAlumnoModel::listaTareasAlumnoModel($id_usuario);

      setlocale(LC_TIME, 'es_ES.UTF-8');
      date_default_timezone_set('America/Mexico_City');
      $fechaHoy = date("Y-m-d H:i");

      $strFechaHoy = date("Y-m-d");
      $diaHoy = date("d");
      $mesHoy = date("m");
      $yearHoy = date("Y");
      $hora = date("H:i");
      // echo "Día: ".$diaHoy."<br /> Mes: ".$mesHoy."<br /> Año: ".$yearHoy."<br /> Hora: ".$hora."<br /><br />";

      $default_local_date = ucwords(utf8_encode(strftime("%a %d %b, %Y a las %H:%M")));
      $date_connectors_capital = array('A', 'Las');
      $date_connectors_lower = array('a', 'las');
      $hoy = str_replace($date_connectors_capital, $date_connectors_lower, $default_local_date);

      while ($fila = mysqli_fetch_object($respuesta)) {
        // var_dump($fila);
        // die();
        // $id_usuario = $fila->id_usuario;
        $id_tarea = $fila->id_tarea;
        $titulo = $fila->titulo;
        $descripcion = $fila->descripcion;
        $fecha_publicacion = $fila->fecha_publicacion;
        $fecha_entrega = $fila->fecha_entrega;
        $calificacion = $fila->calificacion;
        $status = $fila->status;
        if ($status == 0) $status = "No entregado";
        if ($status == 1) $status = "Entregado";
        if ($status == 2) $status = "Calificado: ".$calificacion;
        if ($status == 3) $status = "Rechazado";
        $profesor = $fila->nombre.' '.$fila->apellidos;
        // $profesor = $fila->id_usuario;

        $fecha = $fecha_publicacion;
        $fecha = str_replace("/", "-", $fecha);			
        $newDate = date("Y-m-d H:i", strtotime($fecha));
        $conector = " a las ";
        $fechaFormato = ucfirst("%a %d %b, %Y");
        $horaFormato = "%H:%M";
        $strFecha = $fechaFormato.$conector.$horaFormato;
        $fecha_publicacion = ucfirst(strftime($strFecha, strtotime($newDate)));

        $fechaEntrega = $fecha_entrega;
        $fechaEntrega = str_replace("/", "-", $fechaEntrega);	
        		
        $newDate2 = date("Y-m-d H:i", strtotime($fechaEntrega));	

        $strFechaEntrega = date("Y-m-d", strtotime($fechaEntrega));        
        $diaEntrega = date("d", strtotime($fechaEntrega));
        $mesEntrega = date("m", strtotime($fechaEntrega));
        $yearEntrega = date("Y", strtotime($fechaEntrega));
        $horaEntrega = date("H:i", strtotime($fechaEntrega));

        $fecha_entrega =ucfirst(strftime($strFecha, strtotime($newDate2)));

        echo "
        <tr>
          <td>".$titulo."</td>
          <td>".$descripcion."</td>
          <td class='date'>".$fecha_publicacion."</td>
          <td class='date "; if ($diaEntrega < $diaHoy && $mesEntrega == $mesHoy && $horaEntrega < $hora || $yearEntrega < $yearHoy) { 
                                echo 'late';
                              }
                              else if ($diaEntrega < $diaHoy && $mesEntrega == $mesHoy && $horaEntrega > $hora) {
                                echo 'late';
                              }
                              else if ($diaEntrega < $diaHoy && $mesEntrega < $mesHoy && $horaEntrega < $hora) {
                                echo 'late';
                              }
                              else if ($diaEntrega == $diaHoy && $mesEntrega == $mesHoy && $horaEntrega < $hora) {
                                echo 'late';
                              }
                              else if ($diaEntrega == $diaHoy && $mesEntrega == $mesHoy && $horaEntrega < $hora) {
                                echo 'late';
                              } echo "'>".$fecha_entrega."</td>
          <td>".$profesor."</td>
          <td class='
        ";
          if ($status == "Entregado") echo 'status entregado';
          if ($status == "Calificado: ".$calificacion) echo 'status calificado';
          if ($status == "No entregado") echo 'status disabled-color';
          if ($status == "Rechazado") echo 'status no-entregado'; 
          echo "'>"; 
          if ($status == "Entregado") echo "<i class='fas fa-check'></i> ";
          else if ($status == "Calificado: ".$calificacion) echo "<i class='fas fa-check-double'></i>"; 
          else if ($status == "Rechazado") echo "<i class='fas fa-times'></i> "; echo $status."</td>
          <td";
            if ($status == "Calificado: ".$calificacion) echo " class='disabled-color'><i class='fas fa-file-upload'></i> Subir";
              else if ($diaEntrega < $diaHoy && $mesEntrega == $mesHoy && $horaEntrega < $hora && $status == "No entregado" || $yearEntrega < $yearHoy) echo " class='disabled-color'><i class='fas fa-file-upload'></i> Subir";
              else if ($diaEntrega < $diaHoy && $mesEntrega == $mesHoy && $horaEntrega > $hora && $status == "No entregado") echo " class='disabled-color'><i class='fas fa-file-upload'></i> Subir";
              else if ($diaEntrega < $diaHoy && $mesEntrega < $mesHoy && $horaEntrega < $hora && $status == "No entregado") echo " class='disabled-color'><i class='fas fa-file-upload'></i> Subir";
              else if ($diaEntrega == $diaHoy && $mesEntrega == $mesHoy && $horaEntrega < $hora && $status == "No entregado") echo " class='disabled-color'><i class='fas fa-file-upload'></i> Subir";
            else echo "><a href='templateAlumno.php?action=formSubirTarea&titulo=".$titulo."&idUsuario=".$id_usuario."&idTarea=".$id_tarea."'><i class='fas fa-file-upload'></i> Subir</a>";
            echo "
          </td>
        </tr>";
      }
      // var_dump($id_usuario);
      // var_dump($_SESSION['id_usuario']);
    }
    # Subir tarea
    # ----------------------------------------------------------------
    public function subirTareaAlumnoController() {
      // $titulo = $_POST['titulo'];
      if (isset($_POST['enviarTarea'])) {
        // print_r($_FILES);
        // echo "<hr>";
        $archivoNombre = $_FILES['archivo']['name'];
        $archivoGuardado = $_FILES['archivo']['tmp_name'];
        $extension = explode(".", $archivoNombre)[1];
        $allowedfileExtensions = array('jpg', 'jpeg', 'png', 'pdf', 'zip', 'txt', 'docs', 'docx');
        if (in_array($extension, $allowedfileExtensions)) {
          if (!file_exists(VIEW_PATH.'assets/tareas')) {
            mkdir(VIEW_PATH.'assets/tareas', 0777, true);
            if (file_exists(VIEW_PATH.'assets/tareas')) {
              if(move_uploaded_file($archivoGuardado, VIEW_PATH.'assets/tareas/'.$archivoNombre)) {
                echo "Tarea almacenada con éxito";
              } else {
                echo "No se almacenó.";
              }
            }
          } else {
            if(move_uploaded_file($archivoGuardado,VIEW_PATH.'assets/tareas/'.$archivoNombre)) {
              echo "Tarea almacenada con éxito.";
            } else {
              echo "No se almacenó.";
            }
          }
          $datosController = array( "id_usuario"=>$_POST['idUsuario'],
                                    "id_tarea"=>$_POST['idTarea'],
                                    "archivo"=>$archivoNombre);
          echo "<hr>";
          // print_r($datosController);
          // die();
          $respuesta = CrudAlumnoModel::subirTareaAlumnoModel($datosController);
          // print_r($respuesta);
          // die();
          if ($respuesta == "success") {
            header("location: ".DIR_MODULES."alumno/templateAlumno.php?action=envioExitoso");
          } else {
            echo "Error al intentar subir la tarea.";
          }
        } else {
          echo "No puedes subir archivos con esa extensión.";
        }
      }
    }
  }
?>