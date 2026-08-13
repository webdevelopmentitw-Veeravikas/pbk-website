/**
 * COMMON JS — site-wide behavior
 * Homepage slider: assets/js/home.js
 */
(function () {
  'use strict';

  var CMS = window.CMS || {};
  var debounceTimer = null;

  /* Mobile nav */
  var burgerBtn = document.getElementById('burgerBtn');
  var navLinks = document.getElementById('navLinks');
  if (burgerBtn && navLinks) {
    burgerBtn.addEventListener('click', function () {
      var open = navLinks.classList.toggle('open');
      burgerBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  }

  /* Dropdown menus */
  document.querySelectorAll('[data-dropdown]').forEach(function (drop) {
    var btn = drop.querySelector('.dropbtn');
    if (!btn) return;
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      document.querySelectorAll('[data-dropdown].open').forEach(function (other) {
        if (other !== drop) other.classList.remove('open');
      });
      drop.classList.toggle('open');
      btn.setAttribute('aria-expanded', drop.classList.contains('open') ? 'true' : 'false');
    });
  });

  document.addEventListener('click', function () {
    document.querySelectorAll('[data-dropdown].open').forEach(function (drop) {
      drop.classList.remove('open');
      var btn = drop.querySelector('.dropbtn');
      if (btn) btn.setAttribute('aria-expanded', 'false');
    });
  });

  /* Dark mode */
  var themeToggle = document.getElementById('themeToggle');
  var html = document.documentElement;

  function setTheme(theme) {
    html.setAttribute('data-theme', theme);
    document.cookie = 'cms_theme=' + theme + ';path=/;max-age=31536000;SameSite=Lax';
    if (themeToggle) themeToggle.textContent = theme === 'dark' ? '☀️' : '🌙';
  }

  if (themeToggle) {
    themeToggle.addEventListener('click', function () {
      var next = html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
      setTheme(next);
    });
  }

  /* Live search */
  var searchInput = document.getElementById('liveSearchInput');
  var searchDropdown = document.getElementById('searchDropdown');

  function hideSearchDropdown() {
    if (searchDropdown) searchDropdown.hidden = true;
  }

  function baseUrl(path) {
    return (CMS.baseUrl || '') + path;
  }

  function escapeHtml(str) {
    return String(str || '')
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;');
  }

  function renderSearchResults(data, query) {
    if (!searchDropdown) return;
    var posts = (data && data.posts) || [];
    var pages = (data && data.pages) || [];
    var categories = (data && data.categories) || [];
    var htmlParts = [];

    if (!posts.length && !pages.length && !categories.length) {
      htmlParts.push('<div class="search-group">No results</div>');
      htmlParts.push('<div style="padding:12px;font-size:13px;color:#5c6472;">"' + escapeHtml(query) + '"</div>');
    } else {
      if (posts.length) {
        htmlParts.push('<div class="search-group">செய்திகள்</div>');
        posts.forEach(function (p) {
          htmlParts.push('<a href="' + baseUrl('/post/' + encodeURIComponent(p.slug)) + '">' + escapeHtml(p.title) + '</a>');
        });
      }
      if (categories.length) {
        htmlParts.push('<div class="search-group">வகைகள்</div>');
        categories.forEach(function (c) {
          htmlParts.push('<a href="' + baseUrl('/category/' + encodeURIComponent(c.slug)) + '">' + escapeHtml(c.name) + '</a>');
        });
      }
      if (pages.length) {
        htmlParts.push('<div class="search-group">பக்கங்கள்</div>');
        pages.forEach(function (p) {
          htmlParts.push('<a href="' + baseUrl('/page/' + encodeURIComponent(p.slug)) + '">' + escapeHtml(p.title) + '</a>');
        });
      }
    }

    searchDropdown.innerHTML = htmlParts.join('');
    searchDropdown.hidden = false;
  }

  if (searchInput && searchDropdown) {
    searchInput.addEventListener('input', function () {
      var q = searchInput.value.trim();
      clearTimeout(debounceTimer);
      if (q.length < 2) {
        hideSearchDropdown();
        return;
      }
      debounceTimer = setTimeout(function () {
        fetch(baseUrl('/api/search?q=' + encodeURIComponent(q) + '&limit=8'), {
          headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
          .then(function (r) { return r.json(); })
          .then(function (res) {
            if (res.success) renderSearchResults(res.data || {}, q);
          })
          .catch(function () { hideSearchDropdown(); });
      }, 280);
    });

    document.addEventListener('click', function (e) {
      if (!searchInput.contains(e.target) && !searchDropdown.contains(e.target)) {
        hideSearchDropdown();
      }
    });
  }

  /* Newsletter AJAX */
  var newsletterForm = document.getElementById('newsletterForm');
  var newsletterMsg = document.getElementById('newsletterMsg');

  if (newsletterForm) {
    newsletterForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var formData = new FormData(newsletterForm);
      var btn = newsletterForm.querySelector('button[type="submit"]');
      if (btn) btn.disabled = true;

      fetch(newsletterForm.action, {
        method: 'POST',
        body: formData,
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      })
        .then(function (r) { return r.json(); })
        .then(function (res) {
          if (newsletterMsg) {
            newsletterMsg.hidden = false;
            newsletterMsg.className = 'form-msg ' + (res.success ? 'ok' : 'err');
            newsletterMsg.textContent = res.message || (res.success ? 'Thank you!' : 'Subscription failed.');
          }
          if (res.success) newsletterForm.reset();
        })
        .catch(function () {
          if (newsletterMsg) {
            newsletterMsg.hidden = false;
            newsletterMsg.className = 'form-msg err';
            newsletterMsg.textContent = 'Network error. Please try again.';
          }
        })
        .finally(function () {
          if (btn) btn.disabled = false;
        });
    });
  }

  /* Popup notice */
  var popupOverlay = document.getElementById('popupOverlay');
  var popupClose = document.getElementById('popupClose');

  if (popupOverlay) {
    var popupId = popupOverlay.getAttribute('data-popup-id') || 'default';
    var seenKey = 'cms_popup_seen_' + popupId;
    if (!sessionStorage.getItem(seenKey)) {
      popupOverlay.hidden = false;
    }

    function closePopup() {
      popupOverlay.hidden = true;
      sessionStorage.setItem(seenKey, '1');
    }

    if (popupClose) popupClose.addEventListener('click', closePopup);
    popupOverlay.addEventListener('click', function (e) {
      if (e.target === popupOverlay) closePopup();
    });
  }

  /* Copy link */
  document.querySelectorAll('[data-copy-url]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var link = btn.getAttribute('data-copy-url');
      var label = btn.querySelector('.share-copy-label') || btn;
      if (!link) return;
      var done = function () {
        var prev = label.textContent;
        label.textContent = 'Copied!';
        setTimeout(function () { label.textContent = prev || 'Copy'; }, 2000);
      };
      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(link).then(done).catch(function () {
          window.prompt('Copy link:', link);
        });
      } else {
        window.prompt('Copy link:', link);
      }
    });
  });

  /* Native Web Share (mobile / supported browsers) — opens all installed apps */
  document.querySelectorAll('[data-native-share]').forEach(function (btn) {
    var box = btn.closest('[data-share-url]');
    if (!box) return;
    if (!navigator.share) {
      btn.hidden = true;
      return;
    }
    btn.addEventListener('click', function () {
      navigator.share({
        title: box.getAttribute('data-share-title') || document.title,
        url: box.getAttribute('data-share-url') || window.location.href,
        text: box.getAttribute('data-share-title') || ''
      }).catch(function () {});
    });
  });

  var nav = document.querySelector('header.nav');
  if (nav) nav.classList.add('sticky-nav');
})();
