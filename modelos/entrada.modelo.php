<?php

require_once 'conexion.php';

class ModeloEntrada {

  // Mostrar entradas con JOIN a usuarios y productos
  static public function mdlMostrarEntradas($tabla, $item, $valor) {

    if ($item != null) {

      $stmt = Conexion::conectar()->prepare(
        "SELECT e.*, p.codigo AS codigo, u.nombre AS nombreusuario  
         FROM $tabla e 
         INNER JOIN usuarios u ON e.idUsuario = u.idUsuario
         INNER JOIN productos p ON e.idProductos = p.idProductos
         WHERE e.$item = :$item"
      );

      $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
      $stmt->execute();

      return $stmt->fetch();

    } else {

      $stmt = Conexion::conectar()->prepare(
        "SELECT e.*, p.codigo AS codigo,u.nombre AS nombreusuario  
         FROM $tabla e
         INNER JOIN usuarios u ON e.idUsuario = u.idUsuario
         INNER JOIN productos p ON e.idProductos = p.idProductos"
      );

      $stmt->execute();
      return $stmt->fetchAll();
    }
  }

  // Mostrar salidas con JOIN a usuarios y productos
  static public function mdlMostrarSalidas($tabla, $item, $valor) {

    if ($item != null) {

      $stmt = Conexion::conectar()->prepare(
        "SELECT s.*, p.codigo AS codigo, u.nombre AS nombreusuario  
         FROM $tabla s
         INNER JOIN usuarios u ON s.idUsuario = u.idUsuario
         INNER JOIN productos p ON s.idProductos = p.idProductos
         WHERE s.$item = :$item"
      );

      $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
      $stmt->execute();

      return $stmt->fetch();

    } else {

      $stmt = Conexion::conectar()->prepare(
        "SELECT s.*, p.codigo AS codigo, u.nombre AS nombreusuario 
         FROM $tabla s
         INNER JOIN usuarios u ON s.idUsuario = u.idUsuario
         INNER JOIN productos p ON s.idProductos = p.idProductos"
      );

      $stmt->execute();
      return $stmt->fetchAll();
    }
  }

}
