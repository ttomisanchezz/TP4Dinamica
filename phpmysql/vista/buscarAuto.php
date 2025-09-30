<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar Auto</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Tu CSS -->
  <link rel="stylesheet" href="assets/style.css">
</head>
<body class="bg-dark d-flex justify-content-center align-items-center min-vh-100">

  <div class="form-wrapper">
    <h1 class="text-center text-white mb-4 fw-bold">Buscar Auto</h1>
    
    <form id="buscarAutoForm" action="./accion/accionBuscarAuto.php" method="POST" class="needs-validation">
      <div class="mb-4">
        <label for="Patente" class="form-label text-white">Patente</label>
        <input
          type="text"
          id="Patente"
          name="Patente"
          class="form-control text-uppercase"
          required
          pattern="^([A-Z]{3}[0-9]{3}|[A-Z]{2}[0-9]{3}[A-Z]{2})$"
          placeholder="ABC123 o AA123BB"
        >
        <div class="invalid-feedback">Ingrese una patente válida (ej: ABC123 o AA123BB).</div>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-lg">Buscar</button>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Validaciones -->
  <script src="assets/js.js"></script>
</body>
</html>
