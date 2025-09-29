<?php

include_once(__DIR__ . '/../../control/AbmPersona.php');
include_once(__DIR__ . '/../../modelo/persona.php');



if (!empty($_POST)) {
    $datos = [
        'NroDni'   => trim($_POST['Dni'] ?? ''),
        'Apellido' => trim($_POST['Apellido'] ?? ''),
        'Nombre'   => trim($_POST['Nombre'] ?? ''),
        'fechaNac' => trim($_POST['fechaNac'] ?? ''), 
        'Telefono' => trim($_POST['Telefono'] ?? ''),
        'Domicilio'=> trim($_POST['Domicilio'] ?? ''),
    ];

    $abm = new AbmPersona();
    $ok  = $abm->alta($datos);   

    echo $ok ? "Persona cargada correctamente" : "La persona no fue cargada correctamente";
    echo '<p><a href="../menu.php">Volver al Menú Principal</a></p>';
}









