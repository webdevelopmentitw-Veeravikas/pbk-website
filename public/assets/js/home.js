/**
 * HOME PAGE JS — hero slider only
 * Loaded on homepage. Edit slider timing/behavior here.
 */
(function () {
  'use strict';

  var slider = document.getElementById('heroSlider');
  if (!slider) return;

  var slides = slider.querySelectorAll('.hero-slide');
  var dots = slider.querySelectorAll('.slider-dot');
  var current = 0;
  var timer = null;
  var intervalMs = 6000; // change slide speed here

  function goTo(index) {
    if (!slides.length) return;
    current = (index + slides.length) % slides.length;
    slides.forEach(function (s, i) { s.classList.toggle('active', i === current); });
    dots.forEach(function (d, i) { d.classList.toggle('active', i === current); });
  }

  dots.forEach(function (dot) {
    dot.addEventListener('click', function () {
      goTo(parseInt(dot.getAttribute('data-slide'), 10) || 0);
      resetTimer();
    });
  });

  function resetTimer() {
    clearInterval(timer);
    if (slides.length > 1) {
      timer = setInterval(function () { goTo(current + 1); }, intervalMs);
    }
  }

  resetTimer();
})();
