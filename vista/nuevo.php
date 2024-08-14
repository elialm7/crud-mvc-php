<!DOCTYPE html>
<html>
<head>
    <title>Nueva Persona</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <h1>Nueva Persona</h1>
    <form method="POST" action="index.php?accion=nuevo">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label>Apellido:</label>
        <input type="text" name="apellido" required><br>

        <label>Dirección:</label>
        <input type="text" name="direccion" required><br>

        <input type="submit" value="Guardar">
    </form>
</body>
</html>
