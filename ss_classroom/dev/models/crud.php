<?php
  require_once 'conexion.php';
  
  class Crud extends Conexion {
    // Atributos
    private $idUsuario;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    // Registro de usuarios
    public function __construct($datosModel) {
      $this->nombre = $datosModel['nombre'];
      $this->apellidos = $datosModel['apellidos'];
      $this->numero_cuenta = $datosModel['numero_cuenta'];
      $this->email = $datosModel['email'];
      $this->password = $datosModel['password'];
      $this->rol = $datosModel['rol'];
    }
    public function registrarUsuarioModel() {
    //   # Insertamos el rol en la tabla de rol
      // $sql = "INSERT INTO usuario(id_usuario, id_rol, nombre, apellidos, numero_cuenta, password, email, rol) VALUES ($nombre,$apellidos,:password,:numero_cuenta,:email,:rol)";
      // $ans = mysqli_query($this->cnx, $sql);
      // if ($ans == true) 
      //   echo "Registro exitoso, como usted.";
      // else
      //   echo "Error al intentar hacer el registro. ¿Le tiene miedo al éxito?.".mysqli_error($this->cnx).$sql;
      return 'variable: '.$this->nombre; 
    }

    // INSERT INTO usuario(id_usuario, id_rol, nombre, apellidos, numero_cuenta, password, email) VALUES (:nombre,:apellidos,:password,:numero_cuenta,:email,:rol)
  }
  // $db = new Crud();
  // $db -> registrarUsuarioModel();
?>