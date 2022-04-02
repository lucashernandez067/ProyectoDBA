<?php 

class PermisosDelUsuario extends DataBase {
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

    public function insert($data) {
        try{
            $stm = parent::conectar()->prepare(
                "INSERT INTO Permiso (fk_id_Rol, fk_usuarioDocumento) VALUES (?, ?)"
            );
            $stm->bindParam(1, $data['rol'],PDO::PARAM_INT);
            $stm->bindParam(2, $data['documento'],PDO::PARAM_STR);
            $stm->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function delete($data) {
        try{
            $stm = parent::conectar()->prepare("DELETE FROM Permiso WHERE Permiso.fk_id_Rol = ? AND Permiso.fk_usuarioDocumento = ?");
            $stm->bindParam(1, $data['rol'],PDO::PARAM_INT);
            $stm->bindParam(2, $data['documento'],PDO::PARAM_STR);
            $stm->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}