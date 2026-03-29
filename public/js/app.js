/* ============================================================
   E.G.S BTP/SUARL — app.js COMPLET
   ============================================================ */

// ── NAV SCROLL
const navbar = document.getElementById('navbar');
if (navbar) {
  window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 50);
  });
}

// ── MOBILE MENU
const burger = document.getElementById('burger');
const mobileMenu = document.getElementById('mobileMenu');
if (burger && mobileMenu) {
  burger.addEventListener('click', () => {
    mobileMenu.classList.toggle('open');
    // Animation burger
    burger.classList.toggle('open');
  });
  mobileMenu.querySelectorAll('a').forEach(a => {
    a.addEventListener('click', () => {
      mobileMenu.classList.remove('open');
      burger.classList.remove('open');
    });
  });
}

// ── SCROLL ANIMATIONS (Intersection Observer)
const observerOptions = { threshold: 0.12, rootMargin: '0px 0px -40px 0px' };
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.style.opacity = '1';
      entry.target.style.transform = 'translateY(0) translateX(0)';
      observer.unobserve(entry.target);
    }
  });
}, observerOptions);

// Cartes services
document.querySelectorAll('.service-card').forEach((el, i) => {
  el.style.opacity = '0';
  el.style.transform = 'translateY(30px)';
  el.style.transition = `opacity 0.6s ease ${i * 80}ms, transform 0.6s ease ${i * 80}ms`;
  observer.observe(el);
});

// Cartes projets
document.querySelectorAll('.project-card').forEach((el, i) => {
  el.style.opacity = '0';
  el.style.transform = 'translateY(20px)';
  el.style.transition = `opacity 0.5s ease ${i * 100}ms, transform 0.5s ease ${i * 100}ms`;
  observer.observe(el);
});

// Items contact
document.querySelectorAll('.contact-item').forEach((el, i) => {
  el.style.opacity = '0';
  el.style.transform = 'translateX(-20px)';
  el.style.transition = `opacity 0.5s ease ${i * 100}ms, transform 0.5s ease ${i * 100}ms`;
  observer.observe(el);
});

// Cards admin stat
document.querySelectorAll('.admin-stat-card').forEach((el, i) => {
  el.style.opacity = '0';
  el.style.transform = 'translateY(20px)';
  el.style.transition = `opacity 0.5s ease ${i * 80}ms, transform 0.5s ease ${i * 80}ms`;
  observer.observe(el);
});

// Service detail cards
document.querySelectorAll('.service-detail-card').forEach((el, i) => {
  el.style.opacity = '0';
  el.style.transform = 'translateY(30px)';
  el.style.transition = `opacity 0.7s ease ${i * 150}ms, transform 0.7s ease ${i * 150}ms`;
  observer.observe(el);
});

// About sections
document.querySelectorAll('.about-visual, .about-text').forEach((el, i) => {
  el.style.opacity = '0';
  el.style.transform = i === 0 ? 'translateX(-30px)' : 'translateX(30px)';
  el.style.transition = `opacity 0.8s ease ${i * 200}ms, transform 0.8s ease ${i * 200}ms`;
  observer.observe(el);
});

// ── NAV ACTIVE LINK au scroll
const sections = document.querySelectorAll('section[id]');
const navAnchors = document.querySelectorAll('.nav-links a:not(.btn-nav)');
if (sections.length && navAnchors.length) {
  window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(s => {
      if (window.scrollY >= s.offsetTop - 120) current = s.id;
    });
    navAnchors.forEach(a => {
      const href = a.getAttribute('href');
      if (href && href.includes('#')) {
        a.style.color = href.endsWith(current) ? 'var(--gold)' : '';
      }
    });
  }, { passive: true });
}

// ── SMOOTH SCROLL pour liens ancres internes
document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', e => {
    const target = document.querySelector(a.getAttribute('href'));
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
});

// ── CURSOR GLOW (desktop uniquement)
if (window.innerWidth > 1024) {
  const glow = document.createElement('div');
  glow.style.cssText = `
    position: fixed;
    pointer-events: none;
    z-index: 9999;
    width: 300px;
    height: 300px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(201,168,76,.05) 0%, transparent 70%);
    transform: translate(-50%, -50%);
    transition: left .2s ease, top .2s ease;
    will-change: left, top;
  `;
  document.body.appendChild(glow);
  document.addEventListener('mousemove', e => {
    glow.style.left = e.clientX + 'px';
    glow.style.top  = e.clientY + 'px';
  }, { passive: true });
}

// ── COUNTER ANIMATION (stats hero)
function animateCounter(el, target, duration = 1500) {
  let start = 0;
  const step = target / (duration / 16);
  const timer = setInterval(() => {
    start += step;
    if (start >= target) {
      el.textContent = target + (el.dataset.suffix || '');
      clearInterval(timer);
    } else {
      el.textContent = Math.floor(start) + (el.dataset.suffix || '');
    }
  }, 16);
}

// Observer pour déclencher les compteurs
const statObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const el = entry.target;
      const text = el.textContent;
      const num = parseInt(text.replace(/\D/g, ''));
      const suffix = text.replace(/[0-9]/g, '');
      if (num > 0) {
        el.dataset.suffix = suffix;
        animateCounter(el, num);
      }
      statObserver.unobserve(el);
    }
  });
}, { threshold: 0.5 });

document.querySelectorAll('.stat-n').forEach(el => statObserver.observe(el));

// ── FORM VALIDATION visuelle
document.querySelectorAll('.commande-form input, .commande-form textarea, .commande-form select').forEach(input => {
  input.addEventListener('blur', () => {
    if (input.required && !input.value.trim()) {
      input.style.borderColor = '#e74c3c';
    } else {
      input.style.borderColor = 'var(--gold)';
    }
  });
  input.addEventListener('input', () => {
    if (input.value.trim()) {
      input.style.borderColor = 'var(--gold)';
    }
  });
});

// ── COPIER LA RÉFÉRENCE (page confirmation)
const refStrong = document.querySelector('.ref-box strong');
if (refStrong) {
  refStrong.style.cursor = 'pointer';
  refStrong.title = 'Cliquer pour copier';
  refStrong.addEventListener('click', () => {
    navigator.clipboard.writeText(refStrong.textContent.trim()).then(() => {
      const original = refStrong.textContent;
      refStrong.textContent = '✔ Copié !';
      setTimeout(() => { refStrong.textContent = original; }, 2000);
    });
  });
}

// ── ALERT AUTO-CLOSE
document.querySelectorAll('.alert-success, .alert-error').forEach(alert => {
  setTimeout(() => {
    alert.style.transition = 'opacity 0.5s ease';
    alert.style.opacity = '0';
    setTimeout(() => alert.remove(), 500);
  }, 5000);
});

// ── BURGER ANIMATION CSS
const style = document.createElement('style');
style.textContent = `
  .burger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
  .burger.open span:nth-child(2) { opacity: 0; }
  .burger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }
`;
document.head.appendChild(style);