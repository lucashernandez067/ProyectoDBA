<?php

class CategoriasController extends Categoria {

    private $categorias;
    private $security;
    public $rolNombre;
    public function __construct() {
        try{            
            $this->security = new Security();
            $this->security->Validar();
            $this->security->validarRol(3);
            $this->rolNombre = "Administrador";
            $this->categorias = parent::get();
        }catch(Exeption $e) {
            die($e->getMessage());
        }
    }

    public function index() {
        if (@$_SESSION['id']) {
            unset($_SESSION['id']);
        }
        require_once('resources/views/administrador/categorias/index.php');
    }

    public function registrar() {
        $update = false;
        require_once('resources/views/administrador/categorias/form.php');
    }

    public function actualizar(){
        $update = true;
        $_SESSION['id'] = $_GET['id'];
        $_SESSION['categoria'] = parent::getById($_SESSION['id']);
        require_once('resources/views/administrador/categorias/form.php');
    }

    public function create() {
        $data = array(
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion']
        );

        self::createInDataBase($data);

        header('location:'.$this->serverPath.'../Categorias');
    }

    public function edit() {
        $data = array(
            'id' => intval($_SESSION['id']),
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion']
        );

        self::updateInDataBase($data);

        header('location:'.$this->serverPath.'../Categorias');       
    }

    public function eliminar() {
        $id = $_GET['id'];
        $exist = parent::getById($id);
        if ($exist) {
            $belongsProduct = self::findInProducto($id);
            // si existe en un producto
            if ($belongsProduct) {
                $_SESSION['messages'] = 7;
            } else {
                parent::delete($id);
                $_SESSION['messages'] = 5;
            }        
        } else {
            $_SESSION['messages'] = 6;
        }
        header('location:'.$this->serverPath.'../../Categorias');
    }

    private function createInDataBase($data) {
        $alreadyExists = parent::getByName($data['nombre']);
        if ($alreadyExists) {
            // ya existe
            $_SESSION['messages'] = 2;
        } else {
            parent::insert($data);
            $_SESSION['messages'] = 1;
        }
        return;
    }

    private function updateInDataBase($data) {
        $alreadyExists = parent::getByName($data['nombre']);
        // si el nombre ya está registrado
        if ($alreadyExists) {
            // si es el mismo registro
            if ($data['id'] == $alreadyExists[0]->id_Categoria) {
                // verificar si se hizo algún cambio o no
                $esIgual = $data['descripcion'] == $alreadyExists[0]->categoriaDescripcion;
                if ($esIgual) {
                    //no se hicieron cambios
                    $_SESSION['messages'] = 4;
                    return;
                }
            } else {
                // ya existe
                $_SESSION['messages'] = 2;
                return;
            }
        }
        
        // si no hubo ninguna excepción
        parent::update($data);
        $_SESSION['messages'] = 3;
        return;
    }

    private function findInProducto($id) {
        $exist = false;
        $__producto = new Producto();
        $productos = $__producto->get();
        foreach ($productos as $producto) {
            if ($id == $producto->fk_id_Categoria) {
                $exist = true;
            }
        }
        return $exist;
    }
}