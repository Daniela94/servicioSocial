<?php

  class Conexion {
    // Atributos
    private $cnx;
    private $dbhost = DATABASE_HOST;
    private $dbuser = DATABASE_USER;
    private $dbpass = DATABASE_PASSWORD;
    private $dbname = DATABASE_NAME;
   
    // Método constructor
    public function __contruct() {
      $this->conectar();
    }
    // Métodos
    public function conectar() {
      $this->cnx = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
      if (mysqli_connect_error())
        die('Error al intentar conectar con la base de dato. Error'.mysqli_connect_error());
        else echo "Conexión exitosa"."<br />";
      // var_dump($this->cnx);
      // echo "Data base: ".DATABASE_HOST;
      return $this->cnx; # La mandamos a la clase crud.
    }
  }

  // $db = new Conexion();
  // $db -> conectar();
?>