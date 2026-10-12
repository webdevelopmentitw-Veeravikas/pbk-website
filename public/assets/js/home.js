/**
 * HOME PAGE JS — hero slider + media carousels (videos / gallery)
 */
(function () {
  'use strict';

  /* Hero banner slider */
  (function initHeroSlider() {
    var slider = document.getElementById('heroSlider');
    if (!slider) return;

    var slides = slider.querySelectorAll('.hero-slide');
    var dots = slider.querySelectorAll('.slider-dot');
    var current = 0;
    var timer = null;
    var intervalMs = 6000;

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

  function initMediaCarousel(root) {
    if (!root) return;

    var slides = root.querySelectorAll('.media-carousel-slide');
    var dots = root.querySelectorAll('.media-carousel-dot');
    var prev = root.querySelector('.media-carousel-nav.prev');
    var next = root.querySelector('.media-carousel-nav.next');
    if (slides.length < 2) return;

    var current = 0;
    var timer = null;
    var intervalMs = parseInt(root.getAttribute('data-interval'), 10) || 5000;

    function goTo(index) {
      current = (index + slides.length) % slides.length;
      slides.forEach(function (s, i) { s.classList.toggle('active', i === current); });
      dots.forEach(function (d, i) { d.classList.toggle('active', i === current); });
    }

    function resetTimer() {
      clearInterval(timer);
      timer = setInterval(function () { goTo(current + 1); }, intervalMs);
    }

    dots.forEach(function (dot) {
      dot.addEventListener('click', function () {
        goTo(parseInt(dot.getAttribute('data-slide'), 10) || 0);
        resetTimer();
      });
    });

    if (prev) {
      prev.addEventListener('click', function (e) {
        e.preventDefault();
        goTo(current - 1);
        resetTimer();
      });
    }

    if (next) {
      next.addEventListener('click', function (e) {
        e.preventDefault();
        goTo(current + 1);
        resetTimer();
      });
    }

    root.addEventListener('mouseenter', function () { clearInterval(timer); });
    root.addEventListener('mouseleave', resetTimer);

    resetTimer();
  }

  document.querySelectorAll('.media-carousel').forEach(initMediaCarousel);
})();
