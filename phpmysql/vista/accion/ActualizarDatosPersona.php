<?php
include_once(__DIR__ . '/../../control/AbmPersona.php');

if (empty($_POST)) {
  die('Acceso inválido.');
}

// Tomo datos (DNI viene oculto)
$datos = [
  'NroDni'   => trim($_POST['NroDni']   ?? ''),
  'Nombre'   => trim($_POST['Nombre']   ?? ''),
  'Apellido' => trim($_POST['Apellido'] ?? ''),
  'Telefono' => trim($_POST['Telefono'] ?? ''),
  'Domicilio'=> trim($_POST['Domicilio']?? ''),
   'fechaNac' => trim($_POST['fechaNac'] ?? ''),
  // Si tu cargarObjeto() también usa 'fechaNac' u otros, agregalos acá
];

if ($datos['NroDni'] === '' || $datos['Nombre'] === '' || $datos['Apellido'] === '') {
  die('Faltan datos obligatorios (DNI, Nombre, Apellido).');
}

$abm = new AbmPersona();
$ok  = $abm->modificacion($datos);

echo $ok
  ? 'Datos actualizados correctamente. <a href="../menu.php">Volver al menú</a>'
  : 'No se pudieron actualizar los datos.';
