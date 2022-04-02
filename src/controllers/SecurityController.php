<?php

class securityController extends Security {

    public function destroy() {
        unset($_SESSION['usuario']);
        if(isset($_SESSION['usuarioP'])) {
            unset($_SESSION['usuarioP']);
        }
        if(isset($_SESSION['Superadministrador'])) {
            unset($_SESSION['Superadministrador']);           
        }
        if(isset($_SESSION['administrador'])) {
            unset($_SESSION['administrador']);
        }
        session_destroy();
        header('location:'.$this->serverPath.'Login');
    }
    
}