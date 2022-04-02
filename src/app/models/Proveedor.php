<?php

class Proveedor extends DataBase {
    public function get() {
        try{
            $stm = parent::conectar()->prepare("SELECT * FROM ProveedorMaterial");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getByName($nombre) {
        try{
            $stm = parent::conectar()->prepare("SELECT * FROM ProveedorMaterial WHERE proveedorNombre  = '$nombre'");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getById($id) {
        try{
            $stm = parent::conectar()->prepare("SELECT * FROM ProveedorMaterial WHERE id_ProveedorMaterial  = '$id'");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function insert($data) {
        try{
            $stm = parent::conectar()->prepare(
                "INSERT INTO ProveedorMaterial (proveedorNombre, proveedorTelefono, ProveedorDireccion, fk_id_estadoProveedor) 
                VALUES (?, ?, ?, 1)"
            );
            $stm->bindParam(1, $data['nombre'],PDO::PARAM_STR);
            $stm->bindParam(2, $data['telefono'],PDO::PARAM_INT);
            $stm->bindParam(3, $data['direccion'],PDO::PARAM_STR);
            $stm->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function update($data) {
        try{            
            $stm = parent::conectar()->prepare(
                "UPDATE ProveedorMaterial SET proveedorNombre = ?, 
                proveedorTelefono = ?, ProveedorDireccion = ? WHERE ProveedorMaterial.
                id_ProveedorMaterial = ?"
            );
            $stm->bindParam(1, $data['nombre'],PDO::PARAM_STR);
            $stm->bindParam(2, $data['telefono'],PDO::PARAM_INT);
            $stm->bindParam(3, $data['direccion'],PDO::PARAM_STR);
            $stm->bindParam(4, $data['id'],PDO::PARAM_INT);
            $stm->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function delete($id) {
        try{
            $stm = parent::conectar()->prepare(
                "DELETE FROM ProveedorMaterial WHERE ProveedorMaterial.id_ProveedorMaterial = ?"
            );
            $stm->bindParam(1, $id,PDO::PARAM_INT);
            $stm->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getEstado($id) {
        try{
            $stm = parent::conectar()->prepare("SELECT * FROM EstadoProveedor WHERE id_EstadoProveedor = '$id'");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function updateEstado($id, $estado) {
        try{            
            $stm = parent::conectar()->prepare(
                "UPDATE ProveedorMaterial SET fk_id_estadoProveedor = '$estado'
                WHERE ProveedorMaterial.id_ProveedorMaterial = '$id'"
            );
            $stm->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}