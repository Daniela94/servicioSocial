<?php
  class Usuario {
    private $cnx;
    private $data;

    public function __construct($data) {
      $this->cnx = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
      $this->data = $data;
    }

    public function validar() {
      // campos varíos y existentes
      
    }
  }
?>