<?php
require_once '../Control/AbmPersona.php';

$abmPersona   = new AbmPersona();
$listaPersonas = $abmPersona->buscar(); // obtiene todas las personas
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Listado de Personas</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Estilos propios (mismo que ya tenés) -->
  <link rel="stylesheet" href="assets/style.css">
</head>
<body class="bg-dark d-flex justify-content-center align-items-center min-vh-100">

  <main class="menu-wrapper" style="width:min(940px,95%)">
    <header class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-2 mb-3">
      <div>
        <h1 class="text-white fw-bold m-0">Listado de Personas</h1>
        <p class="text-secondary m-0">TP4 · Personas & Autos</p>
      </div>

      <!-- Buscador -->
      <div class="mt-2 mt-md-0">
        <input id="tablaSearch" class="form-control" type="search" placeholder="Buscar por nombre, apellido o DNI…">
      </div>
    </header>

    <div class="card border-0 shadow">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover align-middle m-0" id="tablaPersonas">
            <thead class="table-light">
              <tr>
                <th class="text-nowrap">Nombre</th>
                <th class="text-nowrap">Apellido</th>
                <th class="text-nowrap">DNI</th>
                <th class="text-nowrap text-center">Ver Autos</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($listaPersonas)): ?>
                <?php foreach ($listaPersonas as $persona): ?>
                  <tr>
                    <td><?= htmlspecialchars($persona->getNombre()) ?></td>
                    <td><?= htmlspecialchars($persona->getApellido()) ?></td>
                    <td><?= htmlspecialchars($persona->getNroDni()) ?></td>
                    <td class="text-center">
                      <a
                        class="btn btn-sm btn-primary"
                        href="../vista/accion/accionAutosPersona.php?dni=<?= urlencode($persona->getNroDni()) ?>"
                      >
                        Ver Autos
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="4" class="text-center text-muted py-4">No hay personas cargadas.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Filtro rápido (vanilla JS, sin jQuery) -->
  <script>
    (function(){
      const input = document.getElementById('tablaSearch');
      const rows  = Array.from(document.querySelectorAll('#tablaPersonas tbody tr'));

      input.addEventListener('input', () => {
        const q = input.value.trim().toLowerCase();
        rows.forEach(tr => {
          const text = tr.innerText.toLowerCase();
          tr.style.display = text.includes(q) ? '' : 'none';
        });
      });
    })();
  </script>
</body>
</html>
