<?php
require_once 'modelo/PersonaDaoPDO.php';
require_once 'modelo/Persona.php';

class PersonaControlador {

    private $personaDAO;

    public function __construct() {
        $this->personaDAO = new PersonaDAOPDO();
    }

    public function index() {
        $personas = $this->personaDAO->obtenerTodos();
        require 'vista/listado.php';
    }

    public function nuevo() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $direccion = $_POST['direccion'];

            $personaDTO = new Persona(null, $nombre, $apellido, $direccion);
            $this->personaDAO->crear($personaDTO->getNombre(), $personaDTO->getApellido(), $personaDTO->getDireccion());
            header('Location: index.php');
        } else {
            require 'vista/nuevo.php';
        }
    }

    public function editar($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $direccion = $_POST['direccion'];

            $personaDTO = new Persona($id, $nombre, $apellido, $direccion);
            $this->personaDAO->actualizar($personaDTO->getId(), $personaDTO->getNombre(), $personaDTO->getApellido(), $personaDTO->getDireccion());
            header('Location: index.php');
        } else {
            $persona = $this->personaDAO->obtenerPorId($id);
            require 'vista/editar.php';
        }
    }

    public function eliminar($id) {
        $this->personaDAO->eliminar($id);
        header('Location: index.php');
    }
}
?>
