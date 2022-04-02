<?php 

require_once('app/core/loading.html');

class UsuarioController extends Usuario {

    public $tiposDocumento;
    private $security;
    public $rolNombre;
    public function __construct() {
        try{
            $this->security = new Security();
            $this->security->Validar();
            $this->security->validarRol(1);
            $this->tiposDocumento = parent::consultarTiposDocumento();            
            $this->rolNombre = "Usuario";
        }catch(Exeption $e) {
            die($e->getMessage());
        }
    }
    
    public function index() {
        require_once('resources/views/usuario/index.php');
    }

    public function datos() {
        require_once('resources/views/usuario/datosDeUsuario.php');
    }

    public function actualizar() {
        require_once('resources/views/usuario/actualizarDatos.php');
    }

    public function findTipoDocumento() {
        $result = parent::consultarPorTipoDocumento(
            $_SESSION['usuario']->usuarioDocumento, $_SESSION['usuario']->fk_id_TipoDocumento
        );
        return $result;
    }

    public function findPermisos() {
        $result = [];
        $permisos = parent::consultarPermisos($_SESSION['usuario']->usuarioDocumento);
        $roles = parent::consultarRoles();
        foreach ($roles as $rol) {
            foreach ($permisos as $permiso) {
                if ($rol->id_Rol == $permiso->fk_id_Rol) {
                    array_push($result, $rol->rolNombre);
                }
            }
        }
        return $result;
    }
    
}