<?php
  require_once 'Conexion.php';
  
  class Crud extends Conexion {
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
        // echo $this->numero_cuenta;
      }
      $this->numero_cuenta = $datosModel['numero_cuenta'];
      $this->email = $datosModel['email'];
      $this->password = $datosModel['password'];
      $this->rol = $datosModel['rol'];
      // parent::__construct();
    }
    # Método para agregar usuario
    # --------------------------------------------
    public function registrarUsuarioModel() {
      // var_dump(parent::getCnx());
      // die();
      $sql = "INSERT INTO usuario(id_rol, nombre, apellidos, numero_cuenta, email, password) VALUES ($this->rol,'$this->nombre','$this->apellidos',$this->numero_cuenta,'$this->email','$this->password')";
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      if ($query == true) {
        // header('Location: '.DIR_MODULES.'admin/templateAdmin.php?action=formRegistrarUsuario');
        // echo "Registro exitoso, como usted.";
        return "success";
      } else
        echo "Error al intentar hacer el registro. ¿Le tiene miedo al éxito?.<br />".mysqli_error($cnx).'<br />'.$sql;
      // return 'variable: '.$this->nombre;
    }
    # Método para iniciar sesión
    # --------------------------------------------------------
    public function loginUsuarioModel($usuario,$password) {
      $sql = "SELECT * FROM usuario WHERE numero_cuenta = '$usuario' OR email = '$usuario' AND password = '$password'";
      $cnx = new Conexion();
      $cnx -> conectar();
      $query = mysqli_query($cnx->getCnx(), $sql);
      $num_rows = mysqli_num_rows ($query);
      var_dump($num_rows); 
      if($num_rows == 1){
        return $query->fetch_array(MYSQLI_ASSOC);
      } 
      return false;
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
        echo "Error: ".mysqli_error($cnx->getCnx());
      return $query;

      // echo 'No hay profesores registrados';
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

      // echo 'No hay profesores registrados';
    }

  }
?>