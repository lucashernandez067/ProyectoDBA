<?php 

class Movimiento extends DataBase {
    public function get() {
        try{
            $stm = parent::conectar()->prepare("SELECT * FROM Stock");
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
                "INSERT INTO Stock (fk_id_Producto , fk_id_EstadoProducto, stockFechaRegistro, stockCantidad, fk_usuarioDocumento, stockJustificacion)
                VALUES (?, ?, ?, ?, ?, ?)"
            );
            $stm->bindParam(1, $data['producto'],PDO::PARAM_INT);
            $stm->bindParam(2, $data['movimiento'],PDO::PARAM_INT);
            $stm->bindParam(3, $data['fechaRegistro'],PDO::PARAM_STR);
            $stm->bindParam(4, $data['cantidad'],PDO::PARAM_INT);
            $stm->bindParam(5, $data['usuarioDocumento'],PDO::PARAM_INT);
            $stm->bindParam(6, $data['descripcion'],PDO::PARAM_STR);
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

    public function getEstado($id) {
        try{
            $stm = parent::conectar()->prepare("SELECT * FROM EstadoProducto WHERE id_EstadoProducto = '$id'");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getTiposMovimiento() {
        try{
            $stm = parent::conectar()->prepare("SELECT * FROM EstadoProducto");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}