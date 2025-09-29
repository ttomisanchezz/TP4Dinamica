<?php
include_once(__DIR__ . '/../../control/AbmPersona.php');

if (empty($_POST)) {
  die('Acceso inválido.');
}

$dni = trim($_POST['Dni'] ?? '');
if ($dni === '') {
  die('Debe ingresar un DNI.');
}

$abm = new AbmPersona();
$personas = $abm->buscar(['NroDni' => $dni]);

if (!$personas || count($personas) === 0) {
  echo 'No se encontró una persona con ese DNI. ';
  echo '<a href="../nuevaPersona.php">Cargar persona</a>';
  exit;
}

$p = $personas[0]; // primer resultado

$nombre    = htmlspecialchars($p->getNombre());
$apellido  = htmlspecialchars($p->getApellido());
$telefono  = htmlspecialchars($p->getTelefono());
$domicilio = htmlspecialchars($p->getDomicilio()); // ojo: método correcto
$fechaNac  = htmlspecialchars($p->getFechaNac());
$dniView   = htmlspecialchars($dni);

echo <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Editar Persona</title>
  <style>
    body{font-family:system-ui,Arial,sans-serif;background:#f7f7f8;padding:24px}
    form{max-width:520px;margin:auto;background:#fff;padding:20px;border-radius:12px;box-shadow:0 6px 20px rgba(0,0,0,.06)}
    h1{margin-top:0}
    label{display:block;font-weight:600;margin:.5rem 0 .25rem}
    input,button{width:100%;padding:10px;border:1px solid #ddd;border-radius:8px}
    input[readonly]{background:#f2f2f2;color:#555}
    button{margin-top:10px;border:0;background:#16a34a;color:#fff;font-weight:700;cursor:pointer}
  </style>
</head>
<body>
  <form action="ActualizarDatosPersona.php" method="POST" id="formEditar" novalidate>
    <h1>Editar datos de la persona</h1>

    <label for="NroDni">DNI (no editable)</label>
    <input type="text" id="NroDni" name="NroDni_view" value="$dniView" readonly>
    <input type="hidden" name="NroDni" value="$dniView">

    <label for="Nombre">Nombre</label>
    <input type="text" id="Nombre" name="Nombre" value="$nombre" required>

    <label for="Apellido">Apellido</label>
    <input type="text" id="Apellido" name="Apellido" value="$apellido" required>

    <label for="Telefono">Teléfono</label>
    <input type="text" id="Telefono" name="Telefono" value="$telefono">

    <label for="Domicilio">Domicilio</label>
    <input type="text" id="Domicilio" name="Domicilio" value="$domicilio">
     <label for="fechaNac">Fecha de nacimiento</label>
    <input type="date" id="fechaNac" name="fechaNac" value="$fechaNac">

    <button type="submit">Actualizar</button>
  </form>

  <script>
    document.getElementById('formEditar').addEventListener('submit', e=>{
      const nombre = document.getElementById('Nombre').value.trim();
      const apellido = document.getElementById('Apellido').value.trim();
      if(!nombre || !apellido){
        e.preventDefault();
        alert('Nombre y Apellido son obligatorios.');
      }
    });
  </script>
</body>
</html>
HTML;
