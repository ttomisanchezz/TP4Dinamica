<?php
include_once(__DIR__ . '/../../control/AbmPersona.php');
include_once(__DIR__ . '/../../control/AbmAuto.php');

$abmPersona = new AbmPersona();
$abmAuto    = new AbmAuto();

if (!empty($_POST)) {
    $dniForm     = trim($_POST['dni'] ?? '');
    $patenteForm = strtoupper(trim($_POST['Patente'] ?? ''));


    // 1) Verificar que exista la persona
    $duenios = $abmPersona->buscar(['NroDni' => $dniForm]);
    if (!$duenios || count($duenios) === 0) {
        echo 'El DNI ingresado no se encuentra en la base de datos. '
           . 'Ingresá a este link para cargarlo: '
           . '<a href="../nuevaPersona.php">Cargar persona</a>';
        exit;
    }

    // 2) Verificar que exista el auto
    $autos = $abmAuto->buscar(['Patente' => $patenteForm]);
    if (!$autos || count($autos) === 0) {
        echo 'La patente ingresada no se encuentra en la base de datos. '
           . 'Ingresá a este link para cargarlo: '
           . '<a href="../NuevoAuto.php">Cargar auto</a>';
        exit;
    }

    // 3) Tomo datos actuales del auto (para reinsertar igual, cambiando solo el dueño)
    $autoActual = $autos[0];
    $marca  = $autoActual->getMarca();
    $modelo = $autoActual->getModelo();

    // 4) Cambio de dueño sin tocar la PK:
    //    - Baja del registro actual (por Patente)
    //    - Alta del mismo auto con el nuevo DNI
    $datosAlta = [
        'Patente'   => $patenteForm,
        'Marca'     => $marca,
        'Modelo'    => $modelo,
        'DniDuenio' => $dniForm, 
    ];
    $okBaja = $abmAuto->baja(['Patente' => $patenteForm]);
        $okAlta = $abmAuto->alta($datosAlta);

    if (!$okBaja) {
        die('No se pudo preparar el cambio (falló la baja del auto).');
    }elseif($okAlta) {
        echo 'El dueño del auto fue actualizado correctamente.';
        echo '<p><a href="../menu.php">Volver al Menú Principal</a></p>';
    } else {
        echo 'No se pudo actualizar el dueño del auto (falló la alta).';
    }
}
