<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar Persona</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Tu CSS -->
  <link rel="stylesheet" href="assets/style.css">
</head>
<body class="bg-dark d-flex justify-content-center align-items-center min-vh-100">

  <div class="form-wrapper">
    <h1 class="text-center text-white mb-4 fw-bold">Buscar Persona</h1>
    
    <!-- ✅ needs-validation, sin novalidate -->
    <form id="buscarPersonaForm" action="accion/accionBuscarPersona.php" method="POST" class="needs-validation">
      <div class="mb-4">
        <label for="Dni" class="form-label text-white">DNI</label>
        <input
          type="text"
          id="Dni"
          name="Dni"
          class="form-control"
          inputmode="numeric"
          required
          pattern="^[0-9]{7,10}$"
          placeholder="Ingrese DNI (7–10 dígitos)"
        >
        <div class="invalid-feedback">Ingrese un DNI válido (7 a 10 dígitos).</div>
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
