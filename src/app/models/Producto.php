<?php

class Producto extends DataBase {
    public function get() {
        try{
            $stm = parent::conectar()->prepare("SELECT * FROM Producto");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getByName($nombre) {
        try{
            $stm = parent::conectar()->prepare("SELECT * FROM Producto WHERE productoNombre  = '$nombre'");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function findIdByName($nombre) {
        try{
            $stm = parent::conectar()->prepare("SELECT id_Producto FROM Producto WHERE productoNombre = '$nombre'");
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getById($id) {
        try{
            $stm = parent::conectar()->prepare("SELECT * FROM Producto WHERE id_Producto  = '$id'");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function insert($data) {
        try{
            $stm = parent::conectar()->prepare(
                "INSERT INTO Producto (productoNombre , productoCodigo, productoFechaRegistro, fk_id_Categoria, productoDescripcion, fk_id_ProveedorMaterial)
                VALUES (?, ?, ?, ?, ?, ?)"
            );
            $stm->bindParam(1, $data['nombre'],PDO::PARAM_STR);
            $stm->bindParam(2, $data['codigo'],PDO::PARAM_STR);
            $stm->bindParam(3, $data['fechaRegistro'],PDO::PARAM_STR);
            $stm->bindParam(4, $data['categoria'],PDO::PARAM_INT);
            $stm->bindParam(5, $data['descripcion'],PDO::PARAM_STR);
            $stm->bindParam(6, $data['proveedor'],PDO::PARAM_INT);
            $stm->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function update($data) {
        try{            
            $stm = parent::conectar()->prepare(
                "UPDATE Producto SET productoNombre = ?, 
                productoCodigo = ?, fk_id_Categoria = ?, 
                productoDescripcion = ?, fk_id_ProveedorMaterial = ? 
                WHERE Producto.id_Producto = ?"
            );
            $stm->bindParam(1, $data['nombre'],PDO::PARAM_STR);
            $stm->bindParam(2, $data['codigo'],PDO::PARAM_STR);
            $stm->bindParam(3, $data['categoria'],PDO::PARAM_INT);
            $stm->bindParam(4, $data['descripcion'],PDO::PARAM_STR);
            $stm->bindParam(5, $data['proveedor'],PDO::PARAM_INT);
            $stm->bindParam(6, $data['id'],PDO::PARAM_INT);
            $stm->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function delete($id) {
        try{
            $stm = parent::conectar()->prepare(
                "DELETE FROM Producto WHERE Producto.id_Producto = ?"
            );
            $stm->bindParam(1, $id,PDO::PARAM_INT);
            $stm->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}