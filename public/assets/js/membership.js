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
  var AGE_MIN = 18;
  var AGE_MSG = 'உறுப்பினர் பதிவுக்கு வயது 18 அல்லது அதற்கு மேல் இருக்க வேண்டும்.';
  var dobInput = document.getElementById('dobInput');
  var dobError = document.getElementById('dobError');

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

  function pad(n) {
    return n < 10 ? '0' + n : String(n);
  }

  function isoDate(d) {
    return d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate());
  }

  function maxAdultDob() {
    var d = new Date();
    d.setHours(0, 0, 0, 0);
    d.setFullYear(d.getFullYear() - AGE_MIN);
    return d;
  }

  function ageFromDob(value) {
    if (!value) return null;
    var parts = String(value).split('-');
    if (parts.length !== 3) return null;
    var y = parseInt(parts[0], 10);
    var m = parseInt(parts[1], 10) - 1;
    var day = parseInt(parts[2], 10);
    var birth = new Date(y, m, day);
    if (isNaN(birth.getTime()) || birth.getFullYear() !== y || birth.getMonth() !== m || birth.getDate() !== day) {
      return null;
    }
    var today = new Date();
    today.setHours(0, 0, 0, 0);
    var age = today.getFullYear() - birth.getFullYear();
    var monthDiff = today.getMonth() - birth.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birth.getDate())) {
      age -= 1;
    }
    return age;
  }

  function setDobError(message) {
    if (!dobError) return;
    if (message) {
      dobError.hidden = false;
      dobError.textContent = message;
    } else {
      dobError.hidden = true;
      dobError.textContent = '';
    }
  }

  function validateDob() {
    if (!dobInput) return true;
    dobInput.setCustomValidity('');
    if (dobInput.value) {
      var age = ageFromDob(dobInput.value);
      if (age === null || age < AGE_MIN) {
        dobInput.setCustomValidity(AGE_MSG);
      }
    }
    var valid = dobInput.checkValidity();
    var field = dobInput.closest('.field');
    if (field) field.classList.toggle('invalid', !valid);
    setDobError(valid ? '' : (dobInput.validationMessage || AGE_MSG));
    return valid;
  }

  if (dobInput) {
    dobInput.max = isoDate(maxAdultDob());
    dobInput.addEventListener('change', validateDob);
    dobInput.addEventListener('blur', validateDob);
    dobInput.addEventListener('input', validateDob);
  }

  function firstErrorMessage(json) {
    if (!json) return '';
    if (json.message) return json.message;
    if (json.errors && typeof json.errors === 'object') {
      for (var key in json.errors) {
        if (!Object.prototype.hasOwnProperty.call(json.errors, key)) continue;
        var list = json.errors[key];
        if (Array.isArray(list) && list[0]) return list[0];
        if (typeof list === 'string' && list) return list;
      }
    }
    return '';
  }

  function validatePanel(step) {
    var panel = form.querySelector('.ms-panel[data-panel="' + step + '"]');
    if (!panel) return true;
    if (step === 1) validateDob();
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
        if (res.json && res.json.errors && res.json.errors.dob) {
          goTo(1);
          validateDob();
        }
        if (msg) {
          msg.hidden = false;
          msg.className = 'form-msg err';
          msg.textContent = firstErrorMessage(res.json) || 'பதிவு தோல்வியடைந்தது. மீண்டும் முயற்சிக்கவும்.';
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
