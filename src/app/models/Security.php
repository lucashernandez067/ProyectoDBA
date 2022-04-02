<?php

class Security extends DataBase {
    public function validar() {
        if(!isset($_SESSION['usuario'])) {
            header('location:'.$this->serverPath.'Login');
        }
    }
    public function validarRol($rol) {
        if ($rol == 1) {
            if(!isset($_SESSION['usuarioP'])) {
                header('location:'.$this->serverPath.'Login');
            }
        }
        if ($rol == 2) {
            if(!isset($_SESSION['Superadministrador'])) {
                header('location:'.$this->serverPath.'Login');
            }
        }
        if ($rol == 3) {
            if(!isset($_SESSION['administrador'])) {
                header('location:'.$this->serverPath.'Login');
            }
        }
    }
}