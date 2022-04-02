<?php

class ProductosController extends Producto {

    private $productos;
    private $security;
    public $rolNombre;
    private $categoria;
    private $proveedor;
    private $categorias;
    private $proveedores;
    private $movimientos; // sotock
    public $cantidades;
    public function __construct() {
        try{
            $this->security = new Security();
            $this->security->Validar();
            $this->security->validarRol(3);
            $this->rolNombre = "Administrador";
            $this->productos = parent::get();
            $this->categoria = new Categoria();
            $this->proveedor = new Proveedor();
            $this->movimiento = new Stock();
            $this->categorias = $this->categoria->get();
            $this->proveedores = $this->proveedor->get();
            $this->movimientos = $this->movimiento->get();
            $this->cantidades = self::findCantidad();
        }catch(Exeption $e) {
            die($e->getMessage());
        }
    }

    public function index() {
        require_once('resources/views/administrador/productos/index.php');
    }

    public function registrar() {
        $update = false;
        require_once('resources/views/administrador/productos/form.php');
    }

    public function actualizar(){
        $update = true;
        $_SESSION['id'] = $_GET['id'];
        $_SESSION['producto'] = parent::getById($_SESSION['id']);
        if ($_SESSION['producto']) {
            require_once('resources/views/administrador/productos/form.php');
        } else {
            header('location:'.$this->serverPath.'../../Productos');
        }
    }

    public function create() {
        $data = array(
            'nombre' => $_POST['nombre'],
            'codigo' => $_POST['codigo'],
            'categoria' => $_POST['categoria'],
            'proveedor' => $_POST['proveedor'],
            'descripcion' => $_POST['descripcion']
        );

        if ($_POST['cantidad']) {
            $data['cantidad'] = $_POST['cantidad'];
        }

        $fecha = new DateTime();
        $fecha -> modify('-6 hours');
        $ymd = $fecha->format('Y-m-d');
        $time = $fecha->format('H:i:s');
        $dateTime = $ymd . 'T' . $time;

        $data['fechaRegistro'] = $dateTime;

        self::createInDataBase($data);

        header('location:'.$this->serverPath.'../Productos');
    }

    public function edit() {
        $data = array(
            'nombre' => $_POST['nombre'],
            'codigo' => $_POST['codigo'],
            'categoria' => $_POST['categoria'],
            'proveedor' => $_POST['proveedor'],
            'descripcion' => $_POST['descripcion']
        );

        $data['id'] = $_SESSION['id'];

        self::updateInDataBase($data);
        header('location:'.$this->serverPath.'../Productos');        
    }

    public function eliminar() {
        $id = $_GET['id'];
        $exist = parent::getById($id);
        if ($exist) {
            parent::delete($id);
            $_SESSION['messages'] = 5;
        } else {
            $_SESSION['messages'] = 6;
        }
        header('location:'.$this->serverPath.'../../Productos');
    }

    public function findCategoria($id) {
        // instanciamos el modelo de Categoría 
        // para realizar la sub consulta a una tabla externa
        $categoria = $this->categoria->getById($id);
        return $categoria[0]->categoria;
    }

    public function findProveedor($id) {
        $proveedor = $this->proveedor->getById($id);
        return $proveedor[0]->proveedorNombre;
    }

    public function cambiarEstado() {
        $id = $_GET['id'];
        $proveedor = parent::getById($id);
        if ($proveedor) {
            $estado = $proveedor[0]->fk_id_estadoProveedor == 1 ? 2 : 1;
            parent::updateEstado($id, $estado);
            $_SESSION['messages'] = 7;
        } else {
            $_SESSION['messages'] = 8;
        }
        header('location:'.$this->serverPath.'../../Productos');
    }

    private function findCantidad() {
        $cantidades = [];
        foreach ($this->productos as $producto) {
            $contador = 0;
            foreach ($this->movimientos as $movimiento) {
                
                if ($producto->id_Producto == $movimiento->fk_id_Producto) {
                    
                   if ($movimiento->fk_id_EstadoProducto == 1) {
                       $contador = $contador + $movimiento->stockCantidad;
                   } else {
                        $contador = $contador - $movimiento->stockCantidad;
                   }
                   $cantidades[$producto->id_Producto] = $contador;
                   $producto->cantidad = $contador;
                }
            } 
        }
    }

    private function createInDataBase($data) {
        $alreadyExists = parent::getByName($data['nombre']);
        if ($alreadyExists) {
            // ya existe
            $_SESSION['messages'] = 2;
        } else {
            parent::insert($data);
            $id = parent::findIdByName($data['nombre']);
            $data['id'] = $id->id_Producto;
            self::createEntrada($data);
            $_SESSION['messages'] = 1;
        }
        return;
    }

    private function updateInDataBase($data) {
        $alreadyExists = parent::getByName($data['nombre']);
        // si el nombre ya está registrado
        if ($alreadyExists) {
            // si es el mismo registro
            if ($data['id'] == $alreadyExists[0]->id_Producto) {
                // verificar si se hizo algún cambio o no
                $esIgual = $data['codigo'] == $alreadyExists[0]->productoCodigo;
                $esIgual2 = $data['categoria'] == $alreadyExists[0]->fk_id_Categoria;
                $esIgual3 = $data['proveedor'] == $alreadyExists[0]->fk_id_ProveedorMaterial;
                $esIgual4 = $data['descripcion'] == $alreadyExists[0]->productoDescripcion;
                if ($esIgual && $esIgual2 && $esIgual3 && $esIgual4) {
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

    private function createEntrada($data) {
        $descripcion = 'Registro inicial del producto "' . $data['nombre'] . '"';
        
        $entrada = array(
            'producto' => $data['id'],
            'movimiento' => 1,
            'fechaRegistro' => $data['fechaRegistro'],
            'cantidad' => $data['cantidad'],
            'usuarioDocumento' => $_SESSION['usuario']->usuarioDocumento,
            'descripcion' => $descripcion
        );

        $stock = new Stock;
        $stock->insert($entrada);

        return;
    }
}