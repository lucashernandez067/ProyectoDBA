<?php

class SigninController extends Signin {
    
    public $tiposDocumento;

    public function __construct() {
        try{
            $this->tiposDocumento = parent::consultarTiposDocumento();            
        }catch(Exeption $e){
            die($e->getMessage());
        }
    }

    public function index() {
        if (@$_SESSION['allowedUser']) {
            require_once('resources/views/signin/index.php');
        } else {
            self::verify();
        }
    }
    public function verify() {
        require_once('resources/views/signin/verify.php');
    }

    public function verifyDocument() {
        $documento = $_POST['documento'];
        $result = self::verifyPermissions($documento);

        header('location:'.$this->serverPath.'../Signin'.$result);
    }

    private function verifyPermissions($documento) {
        $permiso = parent::consultarPermiso($documento);

        // verificar si tiene permiso
        if ($permiso) {
            // verificar si no está registrado
            if (!parent::consultarUsuario($documento)) {
                // tiene permiso
                $_SESSION['id'] = $permiso[0]->id_UsuarioPermitido;
                $_SESSION['allowedUser'] = true;
                $_SESSION['documento'] = $documento;
                return '';
            } else {
                // ya está registrado
                $_SESSION['messages'] = 1;
                return '';
            }
        } else {
            // no tiene permisos
            $_SESSION['messages'] = 2;
            return '';
        }
    }

    public function cancel(){
        unset($_SESSION['allowedUser']);
        unset($_SESSION['documento']);
        unset($_SESSION['id']);
        session_destroy();
        header('location:'.$this->serverPath.'../Login');
    }

    public function register(){

        $data = array(
            "nombre" => $_POST['nombre'],
            'tipoDocumento' => $_POST['tipoDocumento'],
            'documento' => $_SESSION['documento'],
            'correo' => $_POST['correo'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
            'fecha' => date("Y-m-d H:i:s"),
            'idPermitido' => $_SESSION['id']
        );

        $result = self::recordData($data);

        header('location:'.$this->serverPath.$result);        
    }

    private function recordData($data) {
        $usuario = parent::consultarUsuario($data['documento']);
        if (!$usuario) {
            parent::create($data);
            parent::createPermiso($data);
            unset($_SESSION['allowedUser']);
            unset($_SESSION['documento']);
            unset($_SESSION['id']);
            $_SESSION['messages'] = 5;
            return '../Login';
        } else {
            // usuario ya registrado
            $_SESSION['messages'] = 1;
            return 'Signin';
        }
        
    }

}
