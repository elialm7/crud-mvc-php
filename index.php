<?php
require_once 'controlador/PersonaControlador.php';

$controlador = new PersonaControlador();

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
    switch ($accion) {
        case 'nuevo':
            $controlador->nuevo();
            break;
        case 'editar':
            $controlador->editar($_GET['id']);
            break;
        case 'eliminar':
            $controlador->eliminar($_GET['id']);
            break;
        default:
            $controlador->index();
            break;
    }
} else {
    $controlador->index();
}
?>
