import 'flowbite';
import './blocks/reference-grid.js';
import '../static/icons/fontawesome.js';
import '../static/icons/regular.js';

import.meta.glob(['../images/**', '../fonts/**']);

function syncArrowRotation() {
  // Desktop: Dropdowns
  document.querySelectorAll('[data-dropdown-toggle]').forEach((btn) => {
    const id = btn.getAttribute('data-dropdown-toggle');
    const pane = id ? document.getElementById(id) : null;
    const icon = btn.querySelector('svg');
    if (!pane || !icon) return;
    const open = !pane.classList.contains('hidden');
    icon.classList.toggle('rotate-180', open);
  });

  // Mobile: Accordion (Ebene 1)
  document.querySelectorAll('[data-accordion-target]').forEach((btn) => {
    const sel = btn.getAttribute('data-accordion-target'); // "#id"
    const id = sel ? sel.replace('#', '') : null;
    const pane = id ? document.getElementById(id) : null;
    const icon = btn.querySelector('svg');
    if (!pane || !icon) return;
    const open = !pane.classList.contains('hidden');
    icon.classList.toggle('rotate-180', open);
  });

  // Mobile: Collapse (Ebene 2)
  document.querySelectorAll('[data-collapse-toggle]').forEach((btn) => {
    const id = btn.getAttribute('data-collapse-toggle');
    const pane = id ? document.getElementById(id) : null;
    const icon = btn.querySelector('svg');
    if (!pane || !icon) return;
    const open = !pane.classList.contains('hidden');
    icon.classList.toggle('rotate-180', open);
  });
}

// Nach jedem Klick kurz warten, dann synchronisieren (Flowbite hat bis dahin getoggelt)
document.addEventListener('click', () => setTimeout(syncArrowRotation, 0));

// Bonus: bei ESC‑Schließen / Resize ebenfalls syncen
document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') setTimeout(syncArrowRotation, 0);
});
window.addEventListener('resize', () => setTimeout(syncArrowRotation, 0));

// Einmal initial (falls etwas default-offen ist)
document.addEventListener('DOMContentLoaded', syncArrowRotation);
