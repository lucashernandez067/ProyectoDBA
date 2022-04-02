<?php

class Superadministrador extends DataBase {
    public function get() {
        try{
            $stm = parent::conectar()->prepare("SELECT * FROM Usuario");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getByDocument($documento) {
        try{
            $stm = parent::conectar()->prepare("SELECT * FROM Usuario WHERE usuarioDocumento  = '$documento'");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getEstado($id) {
        try{
            $stm = parent::conectar()->prepare("SELECT * FROM EstadoUsuario WHERE id_EstadoUsuario = '$id'");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function updateEstado($documento, $estado) {
        try{            
            $stm = parent::conectar()->prepare(
                "UPDATE Usuario SET fk_id_EstadoUsuario = '$estado'
                WHERE Usuario.usuarioDocumento = '$documento'"
            );
            $stm->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}