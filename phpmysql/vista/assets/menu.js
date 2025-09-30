// micro-ripple siguiendo el mouse
document.querySelectorAll('.menu-link').forEach(link => {
  link.addEventListener('mousemove', e => {
    const rect = e.currentTarget.getBoundingClientRect();
    e.currentTarget.style.setProperty('--x', `${e.clientX - rect.left}px`);
    e.currentTarget.style.setProperty('--y', `${e.clientY - rect.top}px`);
  });
});

// soporte teclado: activar con Enter/Espacio
document.querySelectorAll('.menu-link').forEach(link => {
  link.addEventListener('keydown', e => {
    if (e.key === 'Enter' || e.key === ' ') {
      e.preventDefault();
      link.click();
    }
  });
});

// navegación por flechas (Up/Down) entre items cuando el modo está activo
const links = Array.from(document.querySelectorAll('.menu-link'));
let keyboardMode = false;

function focusByOffset(delta){
  const idx = links.findIndex(a => a === document.activeElement);
  const next = (idx + delta + links.length) % links.length;
  links[next].focus();
}

document.addEventListener('keydown', e => {
  if (!keyboardMode) return;
  if (['ArrowDown','ArrowUp'].includes(e.key)) {
    e.preventDefault();
    focusByOffset(e.key === 'ArrowDown' ? 1 : -1);
  }
});

document.getElementById('toggleFocus').addEventListener('click', () => {
  keyboardMode = !keyboardMode;
  if (keyboardMode) {
    links[0]?.focus();
  } else {
    document.activeElement.blur?.();
  }
  document.getElementById('toggleFocus').classList.toggle('active', keyboardMode);
});
.form-wrapper{
  width: min(600px, 95%);
  padding: 2.5rem;
  border-radius: 1.25rem;
  background: rgba(12, 14, 22, 0.9);
  border: 1px solid rgba(255,255,255,.08);
  box-shadow: 0 20px 60px rgba(0,0,0,.45);
  backdrop-filter: blur(6px);
}

.form-control{
  font-size: 1.05rem;
  padding: 0.7rem 1rem;
  border-radius: .6rem;
}

.form-control:focus{
  border-color: #0d6efd;
  box-shadow: 0 0 0 .2rem rgba(13,110,253,.25);
}
