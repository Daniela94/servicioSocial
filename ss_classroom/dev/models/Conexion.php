<?php

  class Conexion {
    // ATRIBUTOS
    private $cnx;
    private $dbhost = DATABASE_HOST;
    private $dbuser = DATABASE_USER;
    private $dbpass = DATABASE_PASSWORD;
    private $dbname = DATABASE_NAME;
   
    # Constructor
    # ----------------------------------------------------------------
    // public function __construct() {
    //   $this->conectar();
    // }
    // public function __destruct() {
    //   echo "me muero ;(";
    //   mysqli_close($this->cnx);
    // }

    // MÉTODOS

    # Método para hacer la conexión con la base de datos
    # -----------------------------------------------------------------
    public function getCnx(){
      return $this->cnx;
    }
    public function conectar() {
      $this->cnx = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
      if (mysqli_connect_error())
      die('Error al intentar conectar con la base de dato. Error'.mysqli_connect_error());
      $this->cnx->set_charset("utf8");
    }
    
  }
?>