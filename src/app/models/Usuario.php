<?php 

class Usuario extends DataBase {
    public function consultarPorTipoDocumento($documento, $tipoDocumento) {
        try {
            $stm = parent::conectar()->prepare(
                "SELECT * FROM Usuario 
                INNER JOIN TipoDocumento ON fk_id_TipoDocumento=id_TipoDocumento 
                WHERE Usuario.fk_id_TipoDocumento = '$tipoDocumento' 
                AND usuarioDocumento='$documento'"
            );
            $stm->execute();
            $tipoDocumento = $stm->fetchAll(PDO::FETCH_OBJ);
            $tipoDocumento = $tipoDocumento[0]->tipoDocumento;
            return $tipoDocumento;
        } catch(Exception $e) {

        }
    }

    public function consultarTiposDocumento() {
        try {
            $stm = parent::conectar()->prepare("SELECT * FROM TipoDocumento");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function consultarPermisos($documento) {
        try {
            $stm = parent::conectar()->prepare("SELECT * FROM Permiso WHERE fk_usuarioDocumento='$documento'");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function consultarRoles() {
        try {
            $stm = parent::conectar()->prepare("SELECT * FROM Rol");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
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
}