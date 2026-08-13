/**
 * Legacy entry — loads common.js then home.js if #heroSlider exists.
 * Prefer common.js + home.js from the layout.
 */
(function () {
  var s1 = document.createElement('script');
  s1.src = (window.CMS && CMS.baseUrl ? CMS.baseUrl.replace(/\/$/, '') : '') + '/public/assets/js/common.js';
  s1.defer = true;
  document.head.appendChild(s1);
})();
