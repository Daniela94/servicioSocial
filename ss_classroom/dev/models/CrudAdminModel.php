<?php
  require_once 'Conexion.php';
  
  class CrudAdminModel {
    // Atributos
    private $nombre;
    private $apellidos;
    private $numero_cuenta;
    private $email;
    private $password;
    private $rol;

    # Constructor
    # -------------------------------------------------
    public function __construct($datosModel) {
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
    # Método para agregar un usuario
    # --------------------------------------------
    public function registrarUsuarioModel() {
      $sql = "INSERT INTO usuario(id_rol, nombre, apellidos, numero_cuenta, email, password) VALUES ($this->rol,'$this->nombre','$this->apellidos',$this->numero_cuenta,'$this->email','$this->password')";
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      if ($query == true) {
        return "success";
      } else
        echo "Error al intentar hacer el registro. ¿Le tiene miedo al éxito?.<br />".mysqli_error($cnx).'<br />'.$sql;
    }
    # Mostrar lista de profesores
    # --------------------------------------------
    public function listaProfesoresModel() {
      $sql = "SELECT * FROM usuario WHERE id_rol = 2";
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      if (!$query)
        echo "Error: ".mysqli_error($cnx->getCnx());
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
        echo "Error: ".mysqli_error($cnx->getCnx());
      return $query;
      mysqli_close($query);
    }
    #Editar usuario 
    # ----------------------------------------------
    public function editarUsuarioModel($datosModel) {
      $sql = "SELECT * FROM usuario WHERE id_usuario = $datosModel";
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      $row = mysqli_fetch_array($query);
      if (!$query)
      echo "Error: ".mysqli_error($cnx->getCnx());
      return $row;
      mysqli_close($query);
    }
  }
?>