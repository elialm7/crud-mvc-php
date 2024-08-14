<?php
require_once 'Conexion.php';
require_once 'IPersonaDao.php';
require_once 'Persona.php';

class PersonaDAOPDO implements PersonaDAOInterface {

    private $pdo;

    public function __construct() {
        $this->pdo = Conexion::conectar();
    }

    public function obtenerTodos() {
        $stmt = $this->pdo->query("SELECT * FROM persona");
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $personas = [];

        foreach ($resultados as $fila) {
            $personas[] = new Persona(
                $fila['id'],
                $fila['nombre'],
                $fila['apellido'],
                $fila['direccion']
            );
        }

      
        return $personas;
    }

    public function obtenerPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM persona WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return new Persona(
                $fila['id'],
                $fila['nombre'],
                $fila['apellido'],
                $fila['direccion']
            );
        }

        return null;
    }

    public function crear($nombre, $apellido, $direccion) {
        $stmt = $this->pdo->prepare("INSERT INTO persona (nombre, apellido, direccion) VALUES (:nombre, :apellido, :direccion)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->execute();
    }

    public function actualizar($id, $nombre, $apellido, $direccion) {
        $stmt = $this->pdo->prepare("UPDATE persona SET nombre = :nombre, apellido = :apellido, direccion = :direccion WHERE id = :id");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function eliminar($id) {
        $stmt = $this->pdo->prepare("DELETE FROM persona WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
?>
