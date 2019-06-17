<?php
  require_once 'conexion.php';
  
  class Crud extends Conexion {
    // Atributos
    private $idUsuario;
    private $nombre;
    private $apellidos;
    private $numero_cuenta;
    private $email;
    private $password;
    private $rol;
    protected $cnx;

    // Registro de usuarios
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
      parent::conectar();
    }
    public function conectar() {
      $this->cnx = parent::conectar();
    }
    public function registrarUsuarioModel() {
      $sql = "INSERT INTO usuario(id_rol, nombre, apellidos, numero_cuenta, email, password) VALUES ($this->rol,'$this->nombre','$this->apellidos',$this->numero_cuenta,'$this->email','$this->password')";
      $ans = mysqli_query($this->cnx, $sql);
      if ($ans == true) 
        echo "Registro exitoso, como usted.";
      else
        echo "Error al intentar hacer el registro. ¿Le tiene miedo al éxito?.<br />".mysqli_error($this->cnx).'<br />'.$sql;
      // return 'variable: '.$this->nombre;
    }

    // INSERT INTO usuario(id_usuario, id_rol, nombre, apellidos, numero_cuenta, password, email) VALUES (:nombre,:apellidos,:password,:numero_cuenta,:email,:rol)
  }
  // $db = new Crud();
  // $db -> registrarUsuarioModel();
?>