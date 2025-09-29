<?php
include_once(__DIR__ . '/../../control/AbmAuto.php');
include_once(__DIR__ . '/../../control/AbmPersona.php');

if (!empty($_POST)) {
    $patente = strtoupper(trim($_POST['Patente'] ?? ''));
    $marca   = trim($_POST['Marca']   ?? '');
    $modelo  = trim($_POST['Modelo']  ?? '');
    $dni     = trim($_POST['NroDni']  ?? '');


    $abmPersona = new AbmPersona();

    // 2) ¿Existe el dueño?
    $dueños = $abmPersona->buscar(['NroDni' => $dni]);
    if (!$dueños || count($dueños) === 0) {
        echo 'El DNI ingresado no se encuentra en la base de datos. '
           . 'Ingresá a este link para cargarlo: '
           . '<a href="../nuevaPersona.php">Cargar persona</a>';
        exit;
    }

    // 3) ¿Ya existe la patente? (evita el "Duplicate entry")
    $abmAuto = new AbmAuto();
    $existeAuto = $abmAuto->buscar(['Patente' => $patente]);
    if ($existeAuto && count($existeAuto) > 0) {
        die('La patente ya existe en la base de datos.');
    }

    // 4) Alta del auto
    $datos = [
        'Patente'   => $patente,
        'Marca'     => $marca,
        'Modelo'    => $modelo,
        'DniDuenio'    => $dni, 
    ];

    $ok = $abmAuto->alta($datos);
    echo $ok ? 'Auto cargado correctamente.' : 'No se pudo cargar el auto.';
    echo '<p><a href="../menu.php">Volver al Menú Principal</a></p>';
}
