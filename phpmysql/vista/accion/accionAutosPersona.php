<?php
require_once '../../Control/AbmPersona.php';  // Incluir la capa de control que maneja las personas
require_once '../../Control/AbmAuto.php';     // Incluir la capa de control que maneja los autos

$abmPersona = new AbmPersona();
$abmAuto = new AbmAuto();

if (isset($_GET['dni'])) {
    $dni = $_GET['dni'];
    
    // Buscar los datos de la persona
    $persona = $abmPersona->buscar(['NroDni' => $dni]);

    
    // Buscar los autos de la persona
    $autosPersona = $abmAuto->buscar(['DniDuenio' => $dni]);

} else {
    echo "DNI no especificado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autos de la Persona</title>
</head>
<body>
    <h1>Información de la Persona</h1>
    <?php if (!empty($persona)): ?>
        <p><strong>Nombre:</strong> <?php echo $persona[0]->getNombre(); ?></p>
        <p><strong>Apellido:</strong> <?php echo $persona[0]->getApellido(); ?></p>
        <p><strong>DNI:</strong> <?php echo $persona[0]->getNroDni(); ?></p>

        <h2>Listado de Autos</h2>
        <?php if (!empty($autosPersona)): ?>
            <table border="1">
                <tr>
                    <th>Patente</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                </tr>
                <?php foreach ($autosPersona as $auto): ?>
                <tr>
                    <td><?php echo $auto->getPatente(); ?></td>
                    <td><?php echo $auto->getMarca(); ?></td>
                    <td><?php echo $auto->getModelo(); ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No hay autos asociados a esta persona.</p>
        <?php endif; ?>

    <?php else: ?>
        <p>No se encontró a la persona.</p>
    <?php endif; ?>

    <a href="../menu.php">Volver al Menú Principal</a>
</body>
</html>