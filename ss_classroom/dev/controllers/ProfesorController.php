<?php
  // require_once MODEL_PATH.'CrudProfesorModel.php';

  class ProfesorController {
    # Interacción del profesor con los enlaces de la página
    # --------------------------------------------------
    public function enlacesVistasProfesorController() {
      if (isset($_GET['action'])) {

        $enlacesController = $_GET['action'];
        // vamos a enviarle al modelo la petición del contenido
        // tomar del model la clase
        // con doble dos puntos heredamos la clase y hacemos referencia a la función
        $respuesta = EnlacesProfesorModel::enlacesVistasProfesorModel($enlacesController);
  
        include $respuesta;
      } else {
        echo "<h2 class='h-title'>Bienvenido(a) al SISTEMA ssClassroom</h2>";
      }
    }
    # Registrar nueva tarea 
    # ------------------------------------------------------
    public function registrarTareaController() {
      if (isset($_POST['enviar'])) {

        if (isset($_POST['titulo']) &&
            isset($_POST['descripcion']) &&
            isset($_POST['fecha_publicacion']) &&
            isset($_POST['fecha_entrega'])) {

          if (empty($_POST['titulo']) ||
              empty($_POST['descripcion']) ||
              empty($_POST['fecha_publicacion']) ||
              empty($_POST['fecha_entrega'])) {
                echo "<br><div class='alert alert-warning' role='alert'>Conteste todos los campos.</div>";
          }
          else {
                // recibir el POST en un array
                // print_r($_SESSION['id_usuario']);

                // $strTitulo = "A 'quote' is <b>bold</b>";
                // echo htmlspecialchars($strTitulo, ENT_QUOTES);
                $datosController = array( "id_usuario"=>$_SESSION['id_usuario'],
                                          "titulo"=>htmlspecialchars($_POST['titulo'], ENT_QUOTES),
                                          "descripcion"=>htmlspecialchars($_POST['descripcion'], ENT_QUOTES),
                                          "fecha_publicacion"=>$_POST['fecha_publicacion'],
                                          "fecha_entrega"=>htmlspecialchars($_POST['fecha_entrega'], ENT_QUOTES));
                  // var_dump($datosController);
                  // die();   
                  // echo "entra <br  />";
                  $crud = new CrudProfesorModel($datosController); 
                  $respuesta = $crud -> registrarTareaModel();
                if ($respuesta == "success") {
                  echo '<script>localStorage.setItem("action","registrarTarea"); window.location.href="templateProfesor.php?action=formRegistrarTarea";</script>';
                } else { 
                  echo '<script>localStorage.setItem("action","error"); window.location.href="templateProfesor.php?action=formRegistrarTarea";</script>';
                }
        
          }
        }
        else {
          echo "<br><div class='alert alert-warning' role='alert'>Debe enviar todos los campos.</div>";
        }
      }
    }
    # Mostrar lista de tareas
    # ---------------------------------------------------------------
    public function listaTareasProfesorController() {
      $respuesta = CrudProfesorModel::listaTareasProfesorModel();

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
      // echo $hoy;

      while ($fila = mysqli_fetch_object($respuesta)) {
        $id_tarea = $fila->id_tarea;
        $titulo = $fila->titulo;
        $descripcion = $fila->descripcion;
        $fecha_publicacion = $fila->fecha_publicacion;
        $fecha_entrega = $fila->fecha_entrega;

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
        // echo "Hora de entrega tarea: ".$horaEntrega."<br />";
        // echo "Hora de entrega tarea: ".$strFechaEntrega."<br />";	
        // echo "Día de entrega: ".$diaEntrega."<br /> Mes entrega: ".$mesEntrega."<br /> Año: ".$yearEntrega."<br /> Hora: ".$horaEntrega."<br /><br />";			
        $fecha_entrega = ucfirst(strftime($strFecha, strtotime($newDate2)));        

        // $query_string = 'foo=' . urlencode($foo) . '&bar=' . urlencode($bar);
        // echo '<a href="mycgi?' . htmlentities($url_string) . '">';
        $url_string_link = 'action=tareasAlumnos&titulo='.urlencode($titulo).'&idTarea='.urlencode($id_tarea);
        
        echo "
        <tr>
        <td>".$titulo."</td>
        <td>".$descripcion."</td>
        <td class='date'>".$fecha_publicacion."</td>
          <td class='date ";  if ($diaEntrega < $diaHoy && $mesEntrega == $mesHoy && $horaEntrega < $hora || $yearEntrega < $yearHoy) { 
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
                              echo "'>".$fecha_entrega."</td>
          <td>
            <a href='templateProfesor.php?".htmlentities($url_string_link)."'>
              <i class='fas fa-external-link-alt'></i>
            </a>
            <a href='templateProfesor.php?action=formEditarTarea&idEditar=".$id_tarea."'>
              <i class='fas fa-edit'></i>
            </a>
            <a href='#' data-toggle='modal' data-target='#exampleModal' class='borrar' idBorrar='".$id_tarea."'>
              <i class='fas fa-trash-alt'></i>
            </a>
          </td>
        </tr>";
        // <a href='templateProfesor.php?action=misTareas&idBorrar=".$id_tarea."'>
        //   <i class='fas fa-trash-alt'></i>
        // </a>

        $_SESSION['titulo'] = $titulo;
        
        // var_dump($id_tarea);
        // die();
      }
    }
    # Editar tarea
    # -----------------------------------------------------
    public function editarTareaProfesorController() {
      $datosController = $_GET['idEditar'];
      $respuesta = CrudProfesorModel::editarTareaProfesorModel($datosController);
      // echo $respuesta[4];
      
      setlocale(LC_TIME, 'es_ES.UTF-8');
      // date_default_timezone_set('America/Mexico_City');
      $fecha_inicio = $respuesta['fecha_publicacion'];
      // echo $fecha_inicio;

      $fecha = $fecha_inicio;
      $fecha = str_replace("/", "-", $fecha);			
      $newDate = date("Y-m-d H:i", strtotime($fecha));				
      $fecha_publicacion = strftime("%a %d %b, %Y a las %H:%M", strtotime($newDate));
      $fecha_fin = $respuesta['fecha_entrega'];
      $fecha_fin = strtotime("$fecha_fin");
      $fecha_entrega = date("Y-m-d H:i", $fecha_fin);
      echo "
      <form method='POST'>
        <div class='row'>
          <div class='col'>
            <label for=''>Título</label>
            <input type='hidden' value='".$respuesta['id_tarea']."' name='id_tarea'>
            <input type='text' value='".$respuesta['titulo']."' name='titulo' class='input-form'>
          </div>
        </div>
        <div class='row'>
          <div class='col'>
            <label for=''>Descripción</label>
            <textarea rows='4' cols='50' name='descripcion' class='input-form'>".$respuesta['descripcion']."</textarea>
          </div>
        </div>
        <div class='row'>
          <div class='col'>
            <label for=''>Fecha de publicación</label>
            <p>$fecha_publicacion</p>
            <input type='hidden' name='fecha_publicacion' value='".$fecha_inicio."'>
          </div>
          <div class='col'>
            <label for=''>Fecha de entrega</label>
            <input type='datetime' name='fecha_entrega' value='".$fecha_entrega."' class='input-form'>
          </div>
        </div>
        <div class='row'>
          <div class='col'>
            <a href='templateProfesor.php?action=misTareas' class='input-form btn form-btn-red'>Cancelar</a>
          </div>
          <div class='col'>
            <input type='submit' name='editarTarea' value='Actualizar' class='input-form form-btn-green'>
          </div>
        </div>
      </form>
      ";
    }
    # Actualizar tarea
    # --------------------------------------------------------------
    public function actualizarTareaProfesorController() {
      if (isset($_POST['editarTarea'])) {
        $datosController = array( "id_usuario"=>$_SESSION['id_usuario'],
                                  "id_tarea"=>$_POST['id_tarea'],
                                  "titulo"=>$_POST['titulo'],
                                  "descripcion"=>$_POST['descripcion'],
                                  "fecha_publicacion"=>$_POST['fecha_publicacion'],
                                  "fecha_entrega"=>$_POST['fecha_entrega']);
        // var_dump($datosController);
        // die();
        $actualizar = new CrudProfesorModel($datosController);
        $respuesta = $actualizar -> actualizarTareaProfesorModel();
  
        if ($respuesta == "success") {
          echo '<script>localStorage.setItem("action","actualizacionTarea"); window.location.href="templateProfesor.php?action=misTareas";</script>';
        }
      }
    }
    # Eliminar tareas 
    # -----------------------------------------------------------------------
    public function eliminarTareaProfesorController() {
      if (isset($_GET['idBorrar'])) {
        $datosController = $_GET['idBorrar'];
        $respuesta = CrudProfesorModel::eliminarTareaProfesorModel($datosController);

        if ($respuesta == "success") {
          echo '<script>localStorage.setItem("action","eliminacionTarea"); window.location.href="templateProfesor.php?action=misTareas";</script>';
        }

      }
    }
    # Mostrar lista de status de tareas de los alumnos
    # ----------------------------------------------------------------
    public function listaTareasAlumnosProfesorController() {
      // var_dump($_SERVER['DOCUMENT_ROOT']);
      if (isset($_GET['idTarea'])) {
        $id_tarea = $_GET['idTarea'];
        // var_dump($id_tarea);
        // die();
      }
      // $id_tarea = $_SESSION['idTarea'];
      $respuesta = CrudProfesorModel::listaTareasAlumnosProfesorModel($id_tarea);
      if (isset($_GET['titulo'])) {
        $titulo = $_GET['titulo'];
      }
      echo "Tarea: ".$titulo;
      // var_dump($titulo);
      // die();
      while ($fila = mysqli_fetch_object($respuesta)) {

        $id_alumno_tareas = $fila->id_alumno_tareas;
        $nombre = $fila->nombre;
        $apellidos = $fila->apellidos;
        $archivo = $fila->archivo;
        $calificacion = $fila->calificacion;
        $status = $fila->status;

        $url_string_E = 'action=formCalificarTarea&titulo='.urlencode($titulo).'&idTarea='.urlencode($id_tarea);
        $url_string_R = 'action=tareasAlumnos&rechazarTarea&titulo='.urlencode($titulo).'&idTarea='.urlencode($id_tarea);
        $url_string_C = 'action=formEditarCalificacionTarea&titulo='.urlencode($titulo).'&idTarea='.urlencode($id_tarea);

        $accionesNE = "Calificar | Rechazar";
        $accionesE = "<a href='templateProfesor.php?".htmlentities($url_string_E)."'> 
        Calificar | 
        </a>
        <a href='templateProfesor.php?".htmlentities($url_string_R)."'>
          Rechazar
        </a>";
        $accionesC = "<a href='templateProfesor.php?".htmlentities($url_string_C)."'>
          Editar |
        </a>
        <a href='templateProfesor.php?".htmlentities($url_string_R)."'>
          Rechazar
        </a>";

          echo "
          <tr>
            <td>".$nombre."</td>
            <td>".$apellidos."</td>
            <td"; if($archivo=="") echo " class='disabled-color'> Vacío"; else echo "><a href='".DIR_VIEWS."assets/tareas/".$archivo."' target='_blank'>".$archivo." <i class='fas fa-file-pdf'></a>";
            echo 
            "</td>
            <td";
            if($status==0) echo " class='status'>No entregada";
            if($status==1) echo " class='status'>No calificada";
            if($status==2) echo ">" .$calificacion;
            if($status==3) echo " class='status no-entregado'>Rechazada";
            echo 
            "</td>
            <td";
            if($status==0) echo " class='disabled-color'>".$accionesNE;
            if($status==1) echo ">".$accionesE;
            if($status==2) echo ">".$accionesC;
            if($status==3) echo " class='disabled-color'>".$accionesNE;
            echo "</td>
          </tr>";
      }
    }
    # Calificar tarea 
    # -------------------------------------------------------------------------
    public function calificarTareaAlumnoProfesorController() {
      if (isset($_GET['idTarea'])) $id_tarea = $_GET['idTarea'];
      if (isset($_GET['titulo'])) $titulo = $_GET['titulo'];

      if (isset($_POST['calificar'])) {
        $datosController = array( "id_tarea" => $_POST['idTarea'],  
                                  "calificacion" => $_POST['calificacion']);
        // var_dump($datosController);
        // die();
        $respuesta = CrudProfesorModel::calificarTareaAlumnoProfesorModel($datosController);

        if ($respuesta == "success") {
          header("location: ".DIR_MODULES."profesor/templateProfesor.php?titulo=".$titulo."&idTarea=".$id_tarea."&action=tareaCalificada");
        } else {
          header("location: ".DIR_MODULES."profesor/templateProfesor.php?action=formCalificarTarea");
        }
      }
    }
    # Cambiar calificación
    # --------------------------------------------------------------------------
    public function editarCalificacionAlumnoProfesorController() {
      // if (isset($_POST['actualizarCalificacion'])) {
        $datosController = $_GET['idTarea'];
        $respuesta = CrudProfesorModel::editarCalificacionAlumnoProfesorModel($datosController);
      // }
      
      // $titulo = $respuesta['titulo'];
      $calificacion = $respuesta['calificacion'];
      $titulo = $_GET['titulo'];
      $id_tarea = $_GET['idTarea'];
      
      $url_string_cancelar = 'titulo='.urlencode($titulo).'&idTarea='.urlencode($id_tarea).'&action=tareasAlumnos';

      echo "
      <p>Del 1 al 10 donde 10 es el 100% del valor de la tarea.</p>
      <form method='POST'>
        <div class='row'>
          <div class='col'>
            <label for=''>".$titulo."</label>
          </div>
          <div class='col'>
            <input type='hidden' class='input-form' value=".$id_tarea." name='idTarea'>
            <input type='hidden' class='input-form' value=".$titulo." name='titulo'>
            <input type='number' step='any' min='0' max='10' class='input-form' value=".$calificacion." name='calificacion'>
          </div>
        </div>
        <div class='row'>
          <div class='col'>
            <a href='templateProfesor.php?".htmlentities($url_string_cancelar)."' class='input-form btn form-btn-red'>Cancelar</a>
          </div>
          <div class='col'>
            <input type='submit' value='Calificar' name='actualizarCalificacion' class='input-form form-btn-green'>
          </div>
        </div>
      </form>
      ";
    }
    # Actualizar calificación
    # -----------------------------------------------------------------------------
    public function actualizarCalificacionAlumnoProfesorController() {
      if (isset($_POST['actualizarCalificacion'])) {
        $titulo = $_POST['titulo'];
        $id_tarea = $_POST['idTarea'];
        $datosController = array( "id_tarea" => $id_tarea,
                                  "calificacion" => $_POST['calificacion']);
        $respuesta = CrudProfesorModel::actualizarCalificacionAlumnoProfesorModel($datosController);
  
        if ($respuesta == "success") {
          header("location: ".DIR_MODULES."profesor/templateProfesor.php?titulo=".$titulo."&idTarea=".$id_tarea."&action=calificacionActualizada");
        }
      }
    }
    # Rechazar tarea
    # ---------------------------------------------------------
    public function rechazarTareaAlumnoProfesorController() {
      if (isset($_GET['rechazarTarea'])) {
        if (isset($_GET['titulo'])) {
          $titulo = $_GET['titulo'];
        }
        $id_tarea = $_GET['idTarea'];
        $respuesta = CrudProfesorModel::rechazarTareaAlumnoProfesorModel($id_tarea);

        if($respuesta == "success") {
          header("location: ".DIR_MODULES."profesor/templateProfesor.php?titulo=".$titulo."&idTarea=".$id_tarea."&action=tareaRechazada");
        }
      }
    }
  }
?>