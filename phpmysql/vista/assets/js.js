(function () {
  'use strict';

  const form = document.getElementById('personaForm');

  form.addEventListener('submit', function (event) {
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    }

    form.classList.add('was-validated');
  }, false);
})();

(function () {
  'use strict';

  // selecciona todos los formularios que tengan la clase needs-validation
  const forms = document.querySelectorAll('.needs-validation');

  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
})();

(function () {
  'use strict';

// Si este log no aparece en la consola, la ruta del JS está mal.
console.log('[validaciones] JS cargado');

(function () {
  // Marca visual de Bootstrap (no bloquea envío si HTML5 ya lo bloqueó)
  const forms = document.querySelectorAll('.needs-validation');
  forms.forEach(form => {
    form.addEventListener('submit', (event) => {
      // Si el form no es válido, evitá el envío
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    });
  });
});

  // Normalizaciones de entrada
  const dni = document.getElementById('dni');
  if (dni) {
    dni.addEventListener('input', (e) => {
      e.target.value = e.target.value.replace(/\D/g, ''); // solo dígitos
    });
  }

  const patente = document.getElementById('Patente');
  if (patente) {
    patente.addEventListener('input', (e) => {
      e.target.value = e.target.value.toUpperCase().replace(/[\s-]/g, '');
    });
  }
})();


console.log('[validaciones] JS cargado');

(function () {
  const forms = document.querySelectorAll('.needs-validation');
  forms.forEach(form => {
    form.addEventListener('submit', (event) => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    });
  });

  // Normalización de campos
  const patente = document.getElementById('Patente');
  if (patente) {
    patente.addEventListener('input', e => {
      e.target.value = e.target.value.toUpperCase().replace(/[\s-]/g, '');
    });
  }

  const dni = document.getElementById('NroDni');
  if (dni) {
    dni.addEventListener('input', e => {
      e.target.value = e.target.value.replace(/\D/g, '');
    });
  }
})();
console.log('[validaciones] JS cargado');

(function () {
  const forms = document.querySelectorAll('.needs-validation');
  forms.forEach(form => {
    form.addEventListener('submit', (event) => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    });
  });

  // Normalizaciones de campos
  const dniInputs = document.querySelectorAll('#dni, #Dni, #NroDni');
  dniInputs.forEach(input => {
    input.addEventListener('input', e => {
      e.target.value = e.target.value.replace(/\D/g, '');
    });
  });

  const patente = document.getElementById('Patente');
  if (patente) {
    patente.addEventListener('input', e => {
      e.target.value = e.target.value.toUpperCase().replace(/[\s-]/g, '');
    });
  }
})();
console.log('[validaciones] JS cargado');

(function () {
  const forms = document.querySelectorAll('.needs-validation');
  forms.forEach(form => {
    form.addEventListener('submit', (event) => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    });
  });

  // Normalizaciones de entradas
  const dniInputs = document.querySelectorAll('#dni, #Dni, #NroDni');
  dniInputs.forEach(input => {
    input.addEventListener('input', e => {
      e.target.value = e.target.value.replace(/\D/g, '');
    });
  });

  const patenteInputs = document.querySelectorAll('#Patente');
  patenteInputs.forEach(input => {
    input.addEventListener('input', e => {
      e.target.value = e.target.value.toUpperCase().replace(/[\s-]/g, '');
    });
  });
})();
