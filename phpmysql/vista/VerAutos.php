<?php
include_once(__DIR__ . '/../control/AbmPersona.php');
include_once(__DIR__ . '/../control/AbmAuto.php');

$autos = new AbmAuto();
$persona = new AbmPersona();

$buscar = $autos->buscar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Listado de Autos</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Tus estilos -->
  <link rel="stylesheet" href="assets/style.css">
</head>
<body class="bg-dark d-flex justify-content-center align-items-center min-vh-100">

  <main class="menu-wrapper" style="width:min(940px,95%)">
    <header class="d-flex justify-content-between align-items-center mb-3">
      <div>
        <h1 class="text-white fw-bold m-0">Listado de Autos</h1>
        <p class="text-secondary m-0">TP4 · Personas & Autos</p>
      </div>
      <a href="menu.php" class="btn btn-outline-light btn-sm">⬅ Volver al Menú</a>
    </header>

    <div class="card border-0 shadow">
      <div class="card-body p-0">
        <?php if(count($buscar) > 0): ?>
          <div class="table-responsive">
            <table class="table table-hover align-middle m-0">
              <thead class="table-light">
                <tr>
                  <th>Patente</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Dueño</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($buscar as $auto): ?>
                  <?php
                    $dniDuenio = ["NroDni" => $auto->getDniDuenio()];
                    $duenios = $persona->buscar($dniDuenio);
                    if(count($duenios) > 0){
                      $dueño = $duenios[0];
                      $nombre = htmlspecialchars($dueño->getNombre() . " " . $dueño->getApellido());
                    } else {
                      $nombre = "Dueño no encontrado";
                    }
                  ?>
                  <tr>
                    <td><?= htmlspecialchars($auto->getPatente()) ?></td>
                    <td><?= htmlspecialchars($auto->getMarca()) ?></td>
                    <td><?= htmlspecialchars($auto->getModelo()) ?></td>
                    <td><?= $nombre ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php else: ?>
          <p class="text-center text-muted py-4 m-0">No hay autos cargados.</p>
        <?php endif; ?>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
