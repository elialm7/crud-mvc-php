<!DOCTYPE html>
<html>
<head>
    <title>Listado de Personas</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <h1>Personas</h1>
    <a href="index.php?accion=nuevo" class="btn-nuevo">Nueva Persona</a>
  
    <table border="1">
     
        <?php if (!empty($personas)): ?>
        <?php foreach ($personas as $persona): ?>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
            <tr>
                <td><?= $persona->getId() ?></td>
                <td><?= $persona->getNombre() ?></td>
                <td><?= $persona->getApellido() ?></td>
                <td><?= $persona->getDireccion() ?></td>
                <td>
                    <a href="index.php?accion=editar&id=<?= $persona->getId() ?>" class="btn-editar" >Editar</a>
                    <a href="index.php?accion=eliminar&id=<?= $persona->getId() ?>" class="btn-eliminar" onclick="confirmarEliminacion()">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr>
                    <td colspan="5">No hay personas registradas.</td>
            </tr>
        <?php endif; ?>
    </table>
    <script src="/js/script.js"></script>
</body>
</html>
