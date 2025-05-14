import mixitup from 'mixitup';
import imagesLoaded from 'imagesloaded';

document.addEventListener('DOMContentLoaded', () => {
  const container = document.querySelector('[data-mixitup-container]');

  if (!container) return;

  // Warte bis alle Bilder im Grid geladen sind
  imagesLoaded(container, { background: true }, () => {
    mixitup(container, {
      selectors: {
        target: '.mix',
      },
      animation: {
        effects: 'transition scale',
        duration: 400,
        animateResizeContainer: false,
      },
    });
  });
});

