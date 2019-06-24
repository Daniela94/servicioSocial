CREATE DATABASE IF NOT EXISTS ss_classroom CHARACTER SET utf8 COLLATE utf8_general_ci;
USE ss_classroom;

CREATE TABLE IF NOT EXISTS rol (
  id_rol TINYINT auto_increment,
  rol TINYINT not null,
  PRIMARY KEY (id_rol)
);

CREATE TABLE IF NOT EXISTS usuario (
  id_usuario INT auto_increment,
  id_rol TINYINT,
  nombre VARCHAR(30),
  apellidos VARCHAR(50),
  numero_cuenta VARCHAR(15),
  password TEXT,
  email VARCHAR(50),
  PRIMARY KEY (id_usuario),
  FOREIGN KEY (id_rol) REFERENCES rol (id_rol) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS tarea (
  id_tarea BIGINT auto_increment,
  id_usuario INT,
  titulo VARCHAR(50),
  descripcion VARCHAR(250),
  fecha_publicacion DATETIME,
  fecha_entrega DATETIME,
  PRIMARY KEY (id_tarea),
  FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS alumno_tareas (
  id_alumno_tarea BIGINT auto_increment,
  id_usuario INT,
  id_tarea BIGINT,
  calificacion DECIMAL,
  archivo VARCHAR(50),
  status TINYINT(1),
  PRIMARY KEY (id_alumno_tarea),
  FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario) ON DELETE CASCADE,
  FOREIGN KEY (id_tarea) REFERENCES tarea (id_tarea) ON DELETE CASCADE
);

