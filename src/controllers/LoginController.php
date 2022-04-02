<?php

class loginController extends Login {
    public function index() {
        require_once('resources/views/login/index.php');
    }
    public function auth() {
        $documento = $_POST['documento'];
        $password = $_POST['password'];
        $result = self::verifyUser($documento, $password);
        header('location:'.$this->serverPath.$result);
    }

    private function verifyUser($documento, $password) {
        $usuario = parent::consultaPorUsuario($documento);
        if ($usuario) {
            $hash = $usuario->usuarioPswrd;
            $estado = $usuario->fk_id_EstadoUsuario;
            if(($password == $hash) || (password_verify($password,$hash))) {
                // el resultado será el producto de la verificación de estado, si el estado no presenta problemas 
                // se procede a verificar los permisos (esto es un operador ternario)
                $result = self::verifyState($estado) ? self::verifyState($estado) : self::verifyRol($documento, $usuario);
                return $result; 
            } else {
                // constraseña incorrecta
                $_SESSION['messages'] = 2;
                return "Login";
            }
        } else {
            // usuario no registrado
            $_SESSION['messages'] = 1;
            return "Login";
        }
    }

    private function verifyState($estado) {
        switch ($estado) {
            case 1:
                $estado = true;
            break;
            case 2:
                $estado = false;
            break;
            default: 
                $estado = false;
            break;
        }
        if ($estado) {
            return false;
        } else {
            // estado inactivo
            $_SESSION['messages'] = 3;
            return "Login";
        }  
    }

    private function verifyRol($documento, $usuario) {
        $roles = parent::consultarPermisos($documento);
        $usuarioP = false;
        $Superadministrador = false;
        $administrador = false;
        if ($roles) {
            foreach ($roles as $rol) {
                switch ($rol->fk_id_Rol) {
                    case 1:
                        $usuarioP = true;
                        $_SESSION['usuarioP'] = true;
                    break;
                    case 2: 
                        $Superadministrador = true;
                        $_SESSION['Superadministrador'] = true;
                    break;
                    case 3: 
                        $administrador = true;
                        $_SESSION['administrador'] = true;
                    break;
                    default:
                        $usuarioP = true;
                    break;
                }
            }
            
            $_SESSION['rolNombre'] = self::findRolName($usuarioP, $Superadministrador, $administrador);
            $_SESSION['usuario'] = $usuario;

            return "Usuario";
            
        } else {
            // el usuario no tiene permisos
            $_SESSION['messages'] = 4;
            return "Login";
        }
        
    }

    private function findRolName($usuarioP, $Superadministrador, $administrador) {
        $RolName = 'indefinido';
        $rol = parent::consultarRoles();
        if($usuarioP and $Superadministrador and $administrador) {
            $RolName = $rol[1]->rolNombre;
        }
        if($usuarioP and $Superadministrador and !$administrador) {
            $RolName = $rol[1]->rolNombre;
        }
        if($Superadministrador and $administrador and !$usuarioP) {
            $RolName = $rol[1]->rolNombre;
        }
        if($usuarioP and $administrador and !$Superadministrador) {
            $RolName = $rol[2]->rolNombre;
        }
        if($usuarioP and !$Superadministrador and !$administrador) {
            $RolName = $rol[0]->rolNombre;
        }
        if(!$usuarioP and $Superadministrador and !$administrador) {
            $RolName = $rol[1]->rolNombre;
        }
        if(!$usuarioP and !$Superadministrador and $administrador) {
            $RolName = $rol[2]->rolNombre;
        }
        return $RolName;
    }
}