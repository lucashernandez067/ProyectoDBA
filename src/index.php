<?php
// traemos el core
require_once('app/core/Core.php');
// recolectamos los parametros de la url
$controller = isset($_REQUEST['c']) ? $_REQUEST['c'] : 'Index';
$method = isset($_REQUEST['m']) ? $_REQUEST['m'] : 'index';
// procesamos los nombres si es necesario
$controller = ucwords($controller) . 'Controller';
$method = strtolower($method);

$ControllerPath = 'controllers/' . $controller . '.php';

// Si el controlador existe
if (file_exists($ControllerPath)) {
    // traemos el controlador
    require_once($ControllerPath);
    // instanciamos el controlador
    $controller = new $controller();
    // si el metodo existe en el controlador
    if (method_exists($controller, $method)) {
        // ejecutamos el metodo
        call_user_func(array($controller,$method));
    } else {
        $error = true;
    }
} else {
    $error = true;
}
// si la variable de error fue definida
if (isset($error)) {
    // forzamos error 404
    header("HTTP/1.0 404 Not Found");
    header("Status: 404 Not Found");
}
?>