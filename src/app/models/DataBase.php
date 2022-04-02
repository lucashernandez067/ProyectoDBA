<?php

class DataBase {

    const server = 'localhost';
    const dbname = 'ngr_inventario';
    const dbuser = 'root';
    const dbpwd = '';
    const context = 'ProyectoCis/src/';
    public $serverPath;
    public function __construct() {
        try{
            $this->serverPath = "http://".$_SERVER['SERVER_NAME']."/ProyectoCis/src/";            
        }catch(Exeption $e){
            die($e->getMessage());
        }
    }
    public static function conectar() {
        try{
            $connection = new PDO(
                'mysql:host=' . self::server .
                ';dbname=' . self::dbname . 
                ';charset=utf8', self::dbuser, self::dbpwd
            );
            $connection -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $connection;
        }catch(Exception $e){
            die($e -> getMessage());
        }
    }

}

