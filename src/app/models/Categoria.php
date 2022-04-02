<?php

class Categoria extends DataBase {
    public function get() {
        try{
            $stm = parent::conectar()->prepare("SELECT * FROM Categoria");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getByName($nombre) {
        try{
            $stm = parent::conectar()->prepare("SELECT * FROM Categoria WHERE categoria  = '$nombre'");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getById($id) {
        try{
            $stm = parent::conectar()->prepare("SELECT * FROM Categoria WHERE id_Categoria  = '$id'");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function insert($data) {
        try{
            $stm = parent::conectar()->prepare(
                "INSERT INTO Categoria (categoria, categoriaDescripcion) VALUES (?, ?)"
            );
            $stm->bindParam(1, $data['nombre'],PDO::PARAM_STR);
            $stm->bindParam(2, $data['descripcion'],PDO::PARAM_STR);
            $stm->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function update($data) {
        try{            
            $stm = parent::conectar()->prepare(
                "UPDATE Categoria SET categoria = ?, 
                categoriaDescripcion = ? WHERE Categoria.id_Categoria = ?"
            );
            $stm->bindParam(1, $data['nombre'],PDO::PARAM_STR);
            $stm->bindParam(2, $data['descripcion'],PDO::PARAM_STR);
            $stm->bindParam(3, $data['id'],PDO::PARAM_INT);
            $stm->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function delete($id) {
        try{
            $stm = parent::conectar()->prepare("DELETE FROM Categoria WHERE Categoria.id_Categoria = ?");
            $stm->bindParam(1, $id,PDO::PARAM_INT);
            $stm->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}