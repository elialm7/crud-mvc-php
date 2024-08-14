<!DOCTYPE html>
<html>
<head>
    <title>Editar Persona</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <h1>Editar Persona</h1>
    <form method="POST" action="index.php?accion=editar&id=<?= $persona->getId()?>">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= $persona->getNombre() ?>" required><br>

        <label>Apellido:</label>
        <input type="text" name="apellido" value="<?= $persona->getApellido() ?>" required><br>

        <label>Dirección:</label>
        <input type="text" name="direccion" value="<?= $persona->getDireccion() ?>" required><br>

        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
