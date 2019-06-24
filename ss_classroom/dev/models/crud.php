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
      parent::conectar();
    }
    # Método para agregar usuario
    # --------------------------------------------
    public function registrarUsuarioModel() {
      // var_dump(parent::getCnx());
      // die();
      $sql = "INSERT INTO usuario(id_rol, nombre, apellidos, numero_cuenta, email, password) VALUES ($this->rol,'$this->nombre','$this->apellidos',$this->numero_cuenta,'$this->email','$this->password')";
      $ans = mysqli_query($this->cnx, $sql);
      if ($ans == true) 
        echo "Registro exitoso, como usted.";
      else
        echo "Error al intentar hacer el registro. ¿Le tiene miedo al éxito?.<br />".mysqli_error($this->cnx).'<br />'.$sql;
      // return 'variable: '.$this->nombre;
    }
    # Método para iniciar sesión
    # --------------------------------------------------------
    public function loginUsuarioModel($usuario,$password) {
      $sql = "SELECT * FROM usuario WHERE numero_cuenta = '$usuario' OR email = '$usuario' AND password = '$password'";
      $cnx = new Conexion();
      $cnx -> conectar();
      $ans = mysqli_query($cnx->getCnx(), $sql);
      $num_rows = mysqli_num_rows ($ans);
      var_dump($num_rows); 
      if($num_rows == 1){
        return $ans->fetch_array(MYSQLI_ASSOC);
      }
      return false;
    }

  }
?>