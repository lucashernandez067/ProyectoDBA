<?php

class Login extends DataBase {
    public function consultaPorUsuario($documento) {
        try {
            $stm = parent::conectar()->prepare("SELECT * FROM Usuario WHERE usuarioDocumento='$documento'");
            $stm->bindParam(1,$documento,PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);
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
            $stm = parent::conectar()->prepare("SELECT rolNombre FROM Rol");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}