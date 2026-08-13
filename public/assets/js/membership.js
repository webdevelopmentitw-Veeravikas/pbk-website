/**
 * Multi-step membership form
 */
(function () {
  'use strict';

  var form = document.getElementById('membershipForm');
  if (!form) return;

  var current = 1;
  var steps = document.querySelectorAll('.ms-step');
  var panels = document.querySelectorAll('.ms-panel');
  var msg = document.getElementById('msMsg');

  function goTo(step) {
    current = step;
    panels.forEach(function (p) {
      p.classList.toggle('active', parseInt(p.getAttribute('data-panel'), 10) === step);
    });
    steps.forEach(function (s) {
      var n = parseInt(s.getAttribute('data-step'), 10);
      s.classList.toggle('active', n === step);
      s.classList.toggle('done', n < step);
    });
    window.scrollTo({ top: form.getBoundingClientRect().top + window.scrollY - 90, behavior: 'smooth' });
  }

  function validatePanel(step) {
    var panel = form.querySelector('.ms-panel[data-panel="' + step + '"]');
    if (!panel) return true;
    var ok = true;
    panel.querySelectorAll('[required]').forEach(function (el) {
      var field = el.closest('.field');
      var valid = el.checkValidity();
      if (field) field.classList.toggle('invalid', !valid);
      if (!valid) ok = false;
    });
    if (!ok) {
      var first = panel.querySelector('.field.invalid input, .field.invalid select, .field.invalid textarea');
      if (first) first.focus();
    }
    return ok;
  }

  form.querySelectorAll('.ms-next').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var next = parseInt(btn.getAttribute('data-next'), 10);
      if (!validatePanel(current)) return;
      goTo(next);
    });
  });

  form.querySelectorAll('.ms-prev').forEach(function (btn) {
    btn.addEventListener('click', function () {
      goTo(parseInt(btn.getAttribute('data-prev'), 10));
    });
  });

  var photoInput = document.getElementById('photoInput');
  var preview = document.getElementById('photoPreview');
  var placeholder = document.getElementById('photoPlaceholder');
  if (photoInput && preview) {
    photoInput.addEventListener('change', function () {
      var file = photoInput.files && photoInput.files[0];
      if (!file) return;
      var url = URL.createObjectURL(file);
      preview.src = url;
      preview.hidden = false;
      if (placeholder) placeholder.hidden = true;
    });
  }

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    if (!validatePanel(1) || !validatePanel(2) || !validatePanel(3)) {
      if (!validatePanel(1)) goTo(1);
      else if (!validatePanel(2)) goTo(2);
      else goTo(3);
      return;
    }

    var submitBtn = document.getElementById('msSubmit');
    if (submitBtn) submitBtn.disabled = true;
    if (msg) { msg.hidden = true; }

    var fd = new FormData(form);
    fetch(form.action, {
      method: 'POST',
      body: fd,
      headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
    })
      .then(function (r) { return r.json().then(function (j) { return { ok: r.ok, json: j }; }); })
      .then(function (res) {
        if (res.json && res.json.success && res.json.redirect) {
          window.location.href = res.json.redirect;
          return;
        }
        if (msg) {
          msg.hidden = false;
          msg.className = 'form-msg err';
          msg.textContent = (res.json && res.json.message) || 'பதிவு தோல்வியடைந்தது. மீண்டும் முயற்சிக்கவும்.';
        }
      })
      .catch(function () {
        if (msg) {
          msg.hidden = false;
          msg.className = 'form-msg err';
          msg.textContent = 'Network error. Please try again.';
        }
      })
      .finally(function () {
        if (submitBtn) submitBtn.disabled = false;
      });
  });
})();
