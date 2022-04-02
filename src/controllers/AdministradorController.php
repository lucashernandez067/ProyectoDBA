<?php

class AdministradorController extends Administrador {

    private $security;
    public $rolNombre;
    public function __construct() {
        try{
            $this->security = new Security();
            $this->security->Validar();
            $this->security->validarRol(3);
            $this->rolNombre = "Administrador";
        }catch(Exeption $e) {
            die($e->getMessage());
        }
    }

    public function index() {
        header('location:'.$this->serverPath.'Stock');
    }

}