<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nueva Persona</title>

  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
    rel="stylesheet"
  >

  <link rel="stylesheet" href="assets/style.css">
</head>
<body class="bg-dark d-flex justify-content-center align-items-center min-vh-100">

  <div class="form-wrapper">
    <h1 class="text-center text-white mb-4 fw-bold">Registrar Persona</h1>
    
    <form id="personaForm" action="accion/accionNuevaPersona.php" method="POST" novalidate>
      <div class="mb-3">
        <label for="Nombre" class="form-label text-white">Nombre</label>
        <input type="text" name="Nombre" id="Nombre" class="form-control" required>
        <div class="invalid-feedback">Por favor ingrese el nombre.</div>
      </div>

      <div class="mb-3">
        <label for="Apellido" class="form-label text-white">Apellido</label>
        <input type="text" name="Apellido" id="Apellido" class="form-control" required>
        <div class="invalid-feedback">Por favor ingrese el apellido.</div>
      </div>

      <div class="mb-3">
        <label for="fechaNac" class="form-label text-white">Fecha de nacimiento</label>
        <input type="date" name="fechaNac" id="fechaNac" class="form-control" required>
        <div class="invalid-feedback">Seleccione una fecha válida.</div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="Dni" class="form-label text-white">DNI</label>
          <input type="text" name="Dni" id="Dni" class="form-control" required pattern="^[0-9]{7,10}$">
          <div class="invalid-feedback">Ingrese un DNI válido (7 a 10 dígitos).</div>
        </div>
        <div class="col-md-6 mb-3">
          <label for="Telefono" class="form-label text-white">Teléfono</label>
          <input type="tel" name="Telefono" id="Telefono" class="form-control" required pattern="^[0-9]{6,15}$">
          <div class="invalid-feedback">Ingrese un teléfono válido (solo números).</div>
        </div>
      </div>

      <div class="mb-4">
        <label for="Domicilio" class="form-label text-white">Domicilio</label>
        <input type="text" name="Domicilio" id="Domicilio" class="form-control" required>
        <div class="invalid-feedback">Por favor ingrese el domicilio.</div>
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
