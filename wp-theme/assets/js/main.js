(function () {
  'use strict';

  /* ────────────────────────────────────────
     Header: glassmorphism ao rolar
  ──────────────────────────────────────── */
  var header     = document.getElementById('site-header');
  var headerLogo = document.getElementById('header-logo');
  var headerNav  = document.getElementById('header-nav');
  var mobileIcon = document.getElementById('mobile-toggle-icon');

  function updateHeader() {
    if (!header) return;
    if (headerNav)  headerNav.style.color  = '#1d1d1b';
    if (mobileIcon) mobileIcon.style.color = '#1d1d1b';

    if (window.scrollY > 60) {
      header.style.background           = 'rgba(255,255,255,0.78)';
      header.style.backdropFilter       = 'saturate(160%) blur(14px)';
      header.style.webkitBackdropFilter = 'saturate(160%) blur(14px)';
      header.style.boxShadow            = '0 1px 0 rgba(0,0,0,0.04), 0 8px 24px rgba(0,0,0,0.06)';
    } else {
      header.style.background           = '#ffffff';
      header.style.backdropFilter       = 'none';
      header.style.webkitBackdropFilter = 'none';
      header.style.boxShadow            = 'none';
    }
  }

  if (header) {
    window.addEventListener('scroll', updateHeader, { passive: true });
    updateHeader();
  }

  /* ────────────────────────────────────────
     Mobile drawer
  ──────────────────────────────────────── */
  var mobileBtn    = document.getElementById('mobile-toggle');
  var mobileClose  = document.getElementById('mobile-close');
  var mobileDrawer = document.getElementById('mobile-drawer');

  if (mobileBtn && mobileDrawer) {
    function openDrawer()  { mobileDrawer.classList.add('open');    document.body.style.overflow = 'hidden'; }
    function closeDrawer() { mobileDrawer.classList.remove('open'); document.body.style.overflow = ''; }

    mobileBtn.addEventListener('click', openDrawer);
    if (mobileClose) mobileClose.addEventListener('click', closeDrawer);
    mobileDrawer.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', closeDrawer);
    });
  }

  /* ────────────────────────────────────────
     Reveal on scroll (IntersectionObserver)
  ──────────────────────────────────────── */
  var revealEls = document.querySelectorAll('.reveal');

  if (revealEls.length) {
    if (!('IntersectionObserver' in window)) {
      revealEls.forEach(function (el) { el.classList.add('is-visible'); });
    } else {
      var revealObs = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
          if (e.isIntersecting) {
            e.target.classList.add('is-visible');
            revealObs.unobserve(e.target);
          }
        });
      }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });

      revealEls.forEach(function (el) { revealObs.observe(el); });
    }
  }

})();

/*
  Comportamentos específicos de página ficam em scripts inline
  nos próprios templates PHP:

  front-page.php  → hero crossfade (slides home-banner-1/2)
  page-servicos.php → tab bar active via IntersectionObserver
                    + smooth scroll com compensação header + tab bar
*/
