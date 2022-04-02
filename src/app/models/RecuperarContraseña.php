<?php 

class RecuperarContraseña extends DataBase {

    public function consultarUsuario($documento) {
        try {
            $stm = parent::conectar()->prepare("SELECT * FROM Usuario WHERE usuarioDocumento='$documento'");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function createPermiso($data) {
        var_dump($data);
        echo '<br>';
        try{
            $stm = parent::conectar()->prepare(
                "INSERT INTO Permiso (fk_id_Rol, fk_usuarioDocumento) VALUES (1, ?)"
            );
            $stm->bindParam(1, $data['documento'],PDO::PARAM_INT);
            $stm->execute();
            return;
        }catch(Exception $e){
            echo "es en permiso";
            echo '<br>';
            die($e->getMessage());
        }
    }

    public function updateCodigoVerif($data) {
        try{            
            $stm = parent::conectar()->prepare(
                "UPDATE Usuario SET usuarioCodigoVerif = ?
                WHERE Usuario.usuarioDocumento = ?"
            );
            $stm->bindParam(1, $data['codigoVerif'],PDO::PARAM_STR);
            $stm->bindParam(2, $data['documento'],PDO::PARAM_STR);
            $stm->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function verifyCodigoInDataBase($codigoVerif) {
        try {
            $stm = parent::conectar()->prepare("SELECT * FROM Usuario WHERE usuarioCodigoVerif='$codigoVerif'");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function update($data) {
        try{            
            $stm = parent::conectar()->prepare(
                "UPDATE Usuario SET usuarioPswrd = ?
                WHERE Usuario.usuarioDocumento = ?"
            );
            $stm->bindParam(1, $data['password'],PDO::PARAM_STR);
            $stm->bindParam(2, $data['documento'],PDO::PARAM_STR);
            $stm->execute();
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}