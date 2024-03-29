<?php
  require_once 'Conexion.php';
  
  class CrudAdminModel {
    // Atributos
    private $id_usuario;
    private $nombre;
    private $apellidos;
    private $numero_cuenta;
    private $email;
    private $password;
    private $rol;

    # Constructor
    # -------------------------------------------------
    public function __construct($datosModel) {
      // $this->id_usuario = $datosModel['id_usuario'];
      $this->nombre = $datosModel['nombre'];
      $this->apellidos = $datosModel['apellidos'];
      if ($datosModel['numero_cuenta'] == "") {
        $datosModel['numero_cuenta'] = 'NULL';
      }
      $this->numero_cuenta = $datosModel['numero_cuenta'];
      $this->email = $datosModel['email'];
      $this->password = $datosModel['password'];
      $this->rol = $datosModel['rol'];
      // parent::__construct();
    }
    # Verificar si ya existe el usuario
    # --------------------------------------------
    public function verificarRegistroUsuarioModel($datosModel) {
      $email = $datosModel['email'];
      $numero_cuenta = $datosModel['numero_cuenta'];
      if ($numero_cuenta == "") {
        $numero_cuenta = "NULL";
      }
      // echo $numero_cuenta;
      // die();
      $cnx = new Conexion();
      $cnx -> conectar();
      $sql = "SELECT email,numero_cuenta FROM usuario WHERE email = '$email' OR numero_cuenta = '$numero_cuenta'";
      // echo $sql."<hr>";
      $query = mysqli_query($cnx->getCnx(), $sql);
      $row = mysqli_fetch_array($query);
      // var_dump($row);
      // die();
      if (!$query)
      echo "Ocurrió un error. Vuelva a intentarlo.";
      mysqli_close($query);
    }
    # Método para agregar un usuario
    # --------------------------------------------
    public function registrarUsuarioModel() {
      $cnx = new Conexion();
      $cnx -> conectar();
      $sql = "INSERT INTO usuario(id_rol, nombre, apellidos, numero_cuenta, email, password) VALUES ($this->rol,'$this->nombre','$this->apellidos',$this->numero_cuenta,'$this->email','$this->password')";
      $query = mysqli_query($cnx->getCnx(), $sql);
      // var_dump($query);
      // die();
      if ($query == true) 
        return "success";
      else
        echo "Error al hacer el registro. Vuelva a intentarlo.";
      mysqli_close($query);
    }
    # Mostrar lista de profesores
    # --------------------------------------------
    public function listaProfesoresModel() {
      $sql = "SELECT * FROM usuario WHERE id_rol = 2";
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      if (!$query)
        echo "Error al mostrar lista.";
      return $query;
      mysqli_close($query);
    }
    # Mostrar lista de alumnos
    # --------------------------------------------
    public function listaAlumnosModel() {
      $sql = "SELECT * FROM usuario WHERE id_rol = 3";
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      if (!$query)
        echo "Error al mostrar lista.";
      return $query;
      mysqli_close($query);
    }
    # Mostrar lista tareas
    # -----------------------------------
    public function listaTareasModel() {
      $sql = "SELECT tarea.*, usuario.id_usuario,usuario.nombre,usuario.apellidos FROM tarea INNER JOIN usuario ON tarea.id_usuario = usuario.id_usuario";
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      if (!$query)
        echo "Error al mostrar lista.";
      return $query;
      mysqli_close($query);
    }
    # Mostrar lista de administradores
    # --------------------------------------------
    public function listaAdminModel() {
      $sql = "SELECT * FROM usuario WHERE id_rol = 1";
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      if (!$query)
        echo "Error al mostrar lista.";
      return $query;
      mysqli_close($query);
    }
    # Editar usuario 
    # ----------------------------------------------
    public function editarUsuarioModel($datosModel) {
      $sql = "SELECT * FROM usuario WHERE id_usuario = $datosModel";
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      $row = mysqli_fetch_array($query);
      // var_dump($row);
      // die();
      if (!$query)
      echo "Ocurrió un error. Vuelva a intentarlo.";
      return $row;
      mysqli_close($query);
    }
    # Actualizar usuario
    # -----------------------------------------------
    public function actualizarUsuarioModel($datosModel) {
      // var_dump($datosModel);
      // echo "<hr />";
      // die();
      $id_usuario = $datosModel['id_usuario'];
      $nombre = $datosModel['nombre'];
      $apellidos = $datosModel['apellidos'];
      if ($datosModel['numero_cuenta'] == "") {
        $datosModel['numero_cuenta'] = 'NULL';
      }
      $numero_cuenta = $datosModel['numero_cuenta'];
      $email = $datosModel['email'];
      $password = $datosModel['password'];
      $id_rol = $datosModel['rol'];
      $sql = "UPDATE usuario SET id_rol = $id_rol, nombre = '$nombre', apellidos = '$apellidos', numero_cuenta = $numero_cuenta, email = '$email', password = '$password' WHERE id_usuario = $id_usuario";
      // print_r($sql);
      // die();
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      
      // echo "<hr />";
      // var_dump($query);
      // die();
      if ($query == true) {
        return "success".$id_rol;
      } else
        echo "Error al actualizar el registro. Vuelva a intentarlo.";
      mysqli_close($query);
    }
    # Eliminar usuario
    # ----------------------------------------------------------------
    public function eliminarUsuarioModel($datosModel) {
      $id_rol = $datosModel['id_rol'];
      $id_usuario = $datosModel['id_usuario'];
      $sql = "DELETE FROM usuario WHERE id_usuario = $id_usuario";
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      if ($query == true) {
        return "success".$id_rol;
      } else
        echo "Error al eliminar el registro. Vuelva a intentarlo.";
      mysqli_close($query);
    }
    
  }
?>