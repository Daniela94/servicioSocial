<?php 
  require_once 'Conexion.php';
 
  class Crud {
    // ATRIBUTOS
    private $nombre;
    private $apellidos;
    private $numero_cuenta;
    private $email;
    private $password;
    private $rol;
    // MÉTODOS
    # Constructor
    # -------------------------------------------
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
    }
    # Método para iniciar sesión según el rol de cada usuario
    # --------------------------------------------------------
    public function loginUsuarioModel($usuario,$password) {
      $cnx = new Conexion();
      $cnx -> conectar();
      $usuario = mysqli_real_escape_string($cnx->getCnx(), $usuario);
      $password = mysqli_real_escape_string($cnx->getCnx(), $password);
      $sql = "SELECT * FROM usuario WHERE numero_cuenta = '$usuario' AND password = '$password' OR email = '$usuario' AND password = '$password'";
      // echo $sql;
      // die();
      $query = mysqli_query($cnx->getCnx(), $sql);
      $num_rows = mysqli_num_rows($query);
      // var_dump($num_rows);
      // die(); 
      if($num_rows == 1){
        return $query->fetch_array(MYSQLI_ASSOC);
      } 
      return false;
      mysqli_close($query);
    }
  }
?>