<?php 

class Signin extends DataBase {
    public function consultarPermiso($documento) {
        try {
            $stm = parent::conectar()->prepare("SELECT * FROM UsuarioPermitido WHERE fk_usuarioDocumento='$documento'");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function consultarUsuario($documento) {
        try {
            $stm = parent::conectar()->prepare("SELECT * FROM Usuario WHERE usuarioDocumento='$documento'");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
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

    public function create($data) {
        try{
            $stm = parent::conectar()->prepare(
                "INSERT INTO Usuario 
                    (usuarioDocumento, fk_id_TipoDocumento, usuarioNombre, 
                    usuarioPswrd, usuarioCodigoVerif, usuarioFechaRegistro, usuarioCorreoElectronico, 
                    fk_id_EstadoUsuario, fk_id_UsuarioPermitido) 
                VALUES (?, ?, ?, ?, 'N/A', ?, ?, 1, ?)"
            );
            $stm->bindParam(1, $data['documento'],PDO::PARAM_INT);
            $stm->bindParam(2, $data['tipoDocumento'],PDO::PARAM_STR);
            $stm->bindParam(3, $data['nombre'],PDO::PARAM_STR);
            $stm->bindParam(4, $data['password'],PDO::PARAM_STR);
            $stm->bindParam(5, $data['fecha'],PDO::PARAM_STR);
            $stm->bindParam(6, $data['correo'],PDO::PARAM_STR);
            $stm->bindParam(7, $data['idPermitido'],PDO::PARAM_INT);
            $stm->execute();
            return;
        }catch(Exception $e){
            echo "es en create";
            echo '<br>';
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
}