<?php 

require_once('app/core/loading.html');

class PermisosDelUsuarioController extends PermisosDelUsuario {

    private $permisos;
    private $permisosDelUsuario;
    private $usuarios;
    private $security;
    public $rolNombre;
    public function __construct() {
        try{
            $this->security = new Security();
            $this->security->Validar();
            $this->security->validarRol(2);
            $this->rolNombre = "Superadministrador";
        }catch(Exeption $e) {
            die($e->getMessage());
        }
    }
    
    public function index() {
        if (!isset($_SESSION['documento']) || !isset($_SESSION['nombre'])) {
            $_SESSION['documento'] = $_POST['documento'];
            $_SESSION['nombre'] = $_POST['nombre'];
        }
        $this->permisosDelUsuario = self::findPermisos($_SESSION['documento']);
        require_once('resources/views/superadministrador/permisosdelusuario/index.php');
    }

    public function registrar() {
        $this->permisos = parent::consultarRoles();
        require_once('resources/views/superadministrador/permisosdelusuario/form.php');
    }

    public function findPermisos($documento) {
        $result = [];
        $permisos = parent::consultarPermisos($documento);
        $roles = parent::consultarRoles();
        foreach ($roles as $rol) {
            foreach ($permisos as $permiso) {
                if ($rol->id_Rol == $permiso->fk_id_Rol) {
                    array_push($result, [$rol->id_Rol, $rol->rolNombre]);
                }
            }
        }
        return $result;
    }

    public function create() {
        $alreadyHasIt = false;
        $rol = $_POST['permiso'];
        $permisosDelUsuario = self::findPermisos($_SESSION['documento']);
        foreach ($permisosDelUsuario as $permisoDelUsuario) {
            if (in_array($rol, $permisoDelUsuario)) {
                $alreadyHasIt = true;
            }
        }
        // si no tiene ese permiso se le agrega
        if (!$alreadyHasIt) {
            $data = array(
                'rol' => $rol,
                'documento' => $_SESSION['documento']
            );
            parent::insert($data);
            $_SESSION['messages'] = 1;
        } else {
            // si es que ya lo tiene se le muestra error
            $_SESSION['messages'] = 2;
        }
        header('location:'.$this->serverPath.'../PermisosDelUsuario');
    }

    public function eliminar() {
        $roles = parent::consultarRoles();
        $id = $_GET['id'];
        // si el permiso no exite
        if (count($roles) < $id) {
            $_SESSION['messages'] = 5;            
        } else {
            if ($id != 1) {
                $data = array(
                    'rol' => $id,
                    'documento' => $_SESSION['documento']
                );
                parent::delete($data);
                $_SESSION['messages'] = 3;    
            } else {
                $_SESSION['messages'] = 4;
            }
        }
        
        header('location:'.$this->serverPath.'../../PermisosDelUsuario');
    }
    
}