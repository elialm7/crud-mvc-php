<?php

class Conexion {

    private static $connection = null;

    public static function conectar() {
        if (self::$connection === null) {
            try {
                $dsn = 'mysql:host=localhost;dbname=crud_php';
                $username = 'root';
                $password = '1234';
                self::$connection = new PDO($dsn, $username, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error en la conexión a la base de datos: " . $e->getMessage());
            }
        }
        return self::$connection;
    }
}
?>
