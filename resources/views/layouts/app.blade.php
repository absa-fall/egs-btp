<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'E.G.S BTP / SUARL')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:wght@300;400;500;600&family=Barlow+Condensed:wght@400;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://egs-btp.onrender.com/css/app.css"/>
  @yield('styles')
</head>
<body>

  <nav id="navbar">
    <div class="nav-inner">
      <a href="{{ route('home') }}" class="logo">
        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
        <span class="logo-text">E.G.S <em>BTP</em></span>
      </a>
      <ul class="nav-links">
        <li><a href="{{ route('home') }}">Accueil</a></li>
        <li><a href="{{ route('services') }}">Services</a></li>
        <li><a href="{{ route('realisations') }}">Réalisations</a></li>
        <li><a href="{{ route('commande.suivi') }}">Suivi</a></li>
        <li><a href="{{ route('commande') }}" class="btn-nav">Commander</a></li>
      </ul>
      <button class="burger" id="burger">
        <span></span><span></span><span></span>
      </button>
    </div>
    <div class="mobile-menu" id="mobileMenu">
      <a href="{{ route('home') }}">Accueil</a>
      <a href="{{ route('services') }}">Services</a>
      <a href="{{ route('realisations') }}">Réalisations</a>
      <a href="{{ route('commande.suivi') }}">Suivi commande</a>
      <a href="{{ route('commande') }}">Commander</a>
    </div>
  </nav>

  <main>
    @yield('content')
  </main>

  <footer>
    <div class="container footer-inner">
      <div class="footer-brand">
        <span class="logo-text">E.G.S <em>BTP</em> / SUARL</span>
        <p>Bureau d'Études Professionnel<br/>Dakar, Sénégal</p>
      </div>
      <div class="footer-links">
        <h5>Navigation</h5>
        <a href="{{ route('services') }}">Services</a>
        <a href="{{ route('realisations') }}">Réalisations</a>
        <a href="{{ route('commande') }}">Commander</a>
        <a href="{{ route('commande.suivi') }}">Suivi commande</a>
      </div>
      <div class="footer-links">
        <h5>Services</h5>
        <a href="#">Génie Civil</a>
        <a href="#">Plans Architecturaux</a>
        <a href="#">Exécution des Travaux</a>
        <a href="#">Conseils</a>
      </div>
      <div class="footer-contact">
        <h5>Contact</h5>
        <p>Tél : <a href="tel:+221784004905">+221 78 400 49 05</a></p>
        <p>Tél : <a href="tel:+221764888407">+221 76 488 84 07</a></p>
        <p>Email : <a href="mailto:fayedabakh146@gmail.com">fayedabakh146@gmail.com</a></p>
        <a href="https://wa.me/221784004905" class="whatsapp-btn" target="_blank">
          WhatsApp
        </a>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© {{ date('Y') }} E.G.S BTP/SUARL — Tous droits réservés</p>
      <a href="{{ route('admin.login') }}">Admin</a>
    </div>
  </footer>

  <script src="https://egs-btp.onrender.com/js/app.js"></script>
  @yield('scripts')
</body>
</html>