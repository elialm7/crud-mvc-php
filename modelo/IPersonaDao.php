<?php

interface PersonaDAOInterface {
    public function obtenerTodos();
    public function obtenerPorId($id);
    public function crear($nombre, $apellido, $direccion);
    public function actualizar($id, $nombre, $apellido, $direccion);
    public function eliminar($id);
}

?>
