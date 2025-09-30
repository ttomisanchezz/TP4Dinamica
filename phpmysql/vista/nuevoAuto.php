<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nuevo Auto</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Tu CSS -->
  <link rel="stylesheet" href="assets/style.css">
</head>
<body class="bg-dark d-flex justify-content-center align-items-center min-vh-100">

  <div class="form-wrapper">
    <h1 class="text-center text-white mb-4 fw-bold">Registrar Auto</h1>
    
    <!-- ✅ sin novalidate para que el navegador bloquee si falta algo -->
    <form id="autoForm" action="accion/accionNuevoAuto.php" method="POST" class="needs-validation">
      <div class="mb-3">
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
        <div class="invalid-feedback">Formato válido: ABC123 o AA123BB (sin espacios).</div>
      </div>

      <div class="mb-3">
        <label for="Marca" class="form-label text-white">Marca</label>
        <input type="text" id="Marca" name="Marca" class="form-control" required>
        <div class="invalid-feedback">Por favor ingrese la marca.</div>
      </div>

      <div class="mb-3">
        <label for="Modelo" class="form-label text-white">Modelo</label>
        <input type="text" id="Modelo" name="Modelo" class="form-control" required>
        <div class="invalid-feedback">Por favor ingrese el modelo.</div>
      </div>

      <div class="mb-4">
        <label for="NroDni" class="form-label text-white">DNI del dueño</label>
        <input
          type="text"
          id="NroDni"
          name="NroDni"
          class="form-control"
          inputmode="numeric"
          required
          pattern="^[0-9]{7,10}$"
          placeholder="Solo números (7–10 dígitos)"
        >
        <div class="invalid-feedback">Ingrese un DNI válido (7 a 10 dígitos).</div>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js.js"></script>
</body>
</html>
