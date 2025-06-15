<?php

require_once 'conexion.php';

class ModeloProductos {

    // Guardar nuevo producto
    static public function mdlGuardarProductos($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla(idCategoria, codigo, descripcion, stock, precio) 
             VALUES(:idCategoria, :codigo, :descripcion, :stock, :precio)"
        );

        $stmt->bindParam(":idCategoria", $datos["idCategoria"], PDO::PARAM_INT);
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_INT);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt = null;
    }

    // Guardar entrada (sin campo 'codigo')
    static public function mdlGuardarProductosEntrada($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla(descripcion, entrada, idProductos, idUsuario) 
             VALUES(:descripcion, :entrada, :idProductos, :idUsuario)"
        );

        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":entrada", $datos["entrada"], PDO::PARAM_INT);
        $stmt->bindParam(":idProductos", $datos["idProductos"], PDO::PARAM_INT);
        $stmt->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt = null;
    }

    // Guardar salida (sin campo 'codigo')
    static public function mdlGuardarProductosSalida($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla(descripcion, salida, idProductos, idUsuario) 
             VALUES(:descripcion, :salida, :idProductos, :idUsuario)"
        );

        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":salida", $datos["salida"], PDO::PARAM_INT);
        $stmt->bindParam(":idProductos", $datos["idProductos"], PDO::PARAM_INT);
        $stmt->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt = null;
    }

    // Mostrar productos
    static public function mdlMostrarProductos($tabla, $item, $valor) {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }

    // Editar producto
    static public function mdlEditarProductos($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla 
             SET idCategoria = :idCategoria, codigo = :codigo, descripcion = :descripcion, stock = :stock, precio = :precio 
             WHERE idProductos = :idProductos"
        );

        $stmt->bindParam(":idProductos", $datos["idProductos"], PDO::PARAM_INT);
        $stmt->bindParam(":idCategoria", $datos["idCategoria"], PDO::PARAM_INT);
        $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_INT);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt = null;
    }

    // Borrar producto
    static public function mdlBorrarProductos($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idProductos = :idProductos");
        $stmt->bindParam(":idProductos", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt = null;
    }

    // Actualizar stock de productos tras una entrada
    static public function mdlActualizarProductosEntrada($tablaDos, $itemDos, $valor, $resultado) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tablaDos SET $itemDos = :$itemDos WHERE idProductos = :idProductos");
        $stmt->bindParam(":".$itemDos, $resultado, PDO::PARAM_INT);
        $stmt->bindParam(":idProductos", $valor, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt = null;
    }

}
