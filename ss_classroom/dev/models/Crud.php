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
      // parent::__construct();
    }
    # Método para iniciar sesión según el rol de cada usuario
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
  }
?>