<?php 

require_once('app/core/loading.html');

class SuperadministradorController extends Superadministrador {

    private $usuarios;
    private $security;
    public $rolNombre;
    public function __construct() {
        try{
            $this->security = new Security();
            $this->security->Validar();
            $this->security->validarRol(2);
            $this->rolNombre = "Superadministrador";
            $this->usuarios = parent::get();
        }catch(Exeption $e) {
            die($e->getMessage());
        }
    }
    
    public function index() {
        unset($_SESSION['documento']);
        unset($_SESSION['nombre']);
        require_once('resources/views/superadministrador/usuarios/index.php');
    }

    public function registrar() {
        require_once('resources/views/superadministrador/usuarios/form.php');
    }

    public function findEstado($id) {
        $estado = parent::getEstado($id);
        return $estado[0]->estadoUsuario;
    }

    public function cambiarEstado() {
        $documento = $_GET['id'];
        if ($_SESSION['usuario']->usuarioDocumento != $documento) {
            $usuario = parent::getByDocument($documento);
            if ($usuario) {
                $estado = $usuario[0]->fk_id_EstadoUsuario == 1 ? 2 : 1;
                parent::updateEstado($documento, $estado);
                $_SESSION['messages'] = 4;
            } else {
                $_SESSION['messages'] = 3;
            }
        } else {
            $_SESSION['messages'] = 5;
        }
        header('location:'.$this->serverPath.'../../Superadministrador');
    }
    
}