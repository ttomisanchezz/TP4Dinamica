<?php
require_once '../Control/AbmPersona.php';  // Incluir la capa de control que maneja las personas

$abmPersona = new AbmPersona();
$listaPersonas = $abmPersona->buscar(); // Llamamos al método listar para obtener todas las personas

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Personas</title>
    <!-- Incluye jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Incluye jQuery Validation Plugin -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>

</head>
<body>
    <h1>Listado de Personas</h1>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Ver Autos</th>
        </tr>
        
        <?php foreach ($listaPersonas as $persona): ?>
        <tr>
            <td><?php echo $persona->getNombre(); ?></td>
            <td><?php echo $persona->getApellido(); ?></td>
            <td><?php echo $persona->getNroDni(); ?></td>
            <td><a href="../vista/accion/accionAutosPersona.php?dni=<?php echo $persona->getNroDni(); ?>">Ver Autos</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
