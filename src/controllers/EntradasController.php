<?php

class EntradasController extends Entrada {

    private $entradas;
    private $productos;
    private $producto;
    private $usuario;
    private $security;
    public $rolNombre;
    public $cantidades;
    public function __construct() {
        try{
            $this->security = new Security();
            $this->security->Validar();
            $this->security->validarRol(3);
            $this->rolNombre = "Administrador";
            $this->entradas = parent::get();
            $this->producto = new Producto();
            $this->productos = $this->producto->get();
            $this->usuario = new Usuario();
        }catch(Exeption $e) {
            die($e->getMessage());
        }
    }

    public function index () {
        require_once('resources/views/administrador/entradas/index.php');
    }

    public function registrar() {
        $update = false;
        require_once('resources/views/administrador/entradas/form.php');
    }

    public function actualizar(){
        $update = true;
        $_SESSION['id'] = $_GET['id'];
        $_SESSION['categoria'] = parent::getById($_SESSION['id']);
        require_once('resources/views/administrador/entradas/form.php');
    }

    public function create() {
        $data = array(
            'producto' => $_POST['producto'],
            'movimiento' => 1,
            'cantidad' => $_POST['cantidad'],
            'descripcion' => $_POST['descripcion']
        );

        $fecha = new DateTime();
        $fecha -> modify('-6 hours');
        $ymd = $fecha->format('Y-m-d');
        $time = $fecha->format('H:i:s');
        $dateTime = $ymd . 'T' . $time;

        $data['fechaRegistro'] = $dateTime;
        $data['usuarioDocumento'] = $_SESSION['usuario']->usuarioDocumento;

        self::createInDataBase($data);

        header('location:'.$this->serverPath.'../Entradas');
    }
    

    public function findProducto ($id) {
        $producto = $this->producto->getById($id);
        return $producto[0]->productoNombre;
    }

    public function findUsuario ($documento) {
        $usuario = $this->usuario->getByDocument($documento);
        return $usuario[0]->usuarioNombre;
    }

    private function createInDataBase($data) {

        $wouldntExist = false;

        foreach ($this->productos as $producto) {
            if ($producto->id_Producto == $data['producto']) {
                $productoSelected = $producto;
            }
        } 
        if ($data['movimiento'] == 2) {
            if (($productoSelected->cantidad - $data['cantidad']) < 1) {
                $wouldntExist = true;
            }
        }
        if ($wouldntExist) {
            // Quedaría menor a 0
            $_SESSION['messages'] = 2;
        } else {
            parent::insert($data);
            $_SESSION['messages'] = 1;
        }
        return;
    }
}
