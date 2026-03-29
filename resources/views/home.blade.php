@extends('layouts.app')
@section('title', 'Accueil — E.G.S BTP')
@section('content')

<!-- HERO -->
<section id="hero">
  <div class="hero-bg">
    <div class="hero-grid"></div>
    <div class="hero-overlay"></div>
  </div>
  <div class="hero-content">
    <p class="hero-badge">Bureau d'Étude Professionnel · Dakar, Sénégal</p>
    <h1 class="hero-title">
      <span class="line1">CONSTRUIRE</span>
      <span class="line2">L'AVENIR</span>
      <span class="line3">ENSEMBLE</span>
    </h1>
    <p class="hero-sub">Génie Civil · BTP · Architecture · Conseils · Exécution</p>
    <div class="hero-cta">
      <a href="{{ route('commande') }}" class="btn-primary">Faire une Commande</a>
      <a href="{{ route('services') }}" class="btn-ghost">Nos Services ↓</a>
    </div>
    <div class="hero-stats">
      <div class="stat"><span class="stat-n">10+</span><span class="stat-l">Ans d'Expérience</span></div>
      <div class="stat-sep"></div>
      <div class="stat"><span class="stat-n">200+</span><span class="stat-l">Projets Réalisés</span></div>
      <div class="stat-sep"></div>
      <div class="stat"><span class="stat-n">100%</span><span class="stat-l">Satisfaction Client</span></div>
    </div>
  </div>
</section>

<!-- SERVICES APERÇU -->
<section id="services-apercu">
  <div class="container">
    <div class="section-header">
      <p class="section-tag">Ce que nous faisons</p>
      <h2 class="section-title">NOS SERVICES</h2>
      <div class="title-bar"></div>
    </div>
    <div class="services-grid">
      <div class="service-card">
        <div class="service-icon">🏗️</div>
        <h3>Génie Civil & BTP</h3>
        <p>Conception et suivi de chantier pour tous types de bâtiments et ouvrages.</p>
      </div>
      <div class="service-card">
        <div class="service-icon">📐</div>
        <h3>Plans Architecturaux</h3>
        <p>Plans détaillés, façades et coupes techniques conformes aux normes.</p>
      </div>
      <div class="service-card">
        <div class="service-icon">🔨</div>
        <h3>Exécution des Travaux</h3>
        <p>Direction et exécution de travaux de construction et rénovation.</p>
      </div>
      <div class="service-card">
        <div class="service-icon">💡</div>
        <h3>Conseils & Expertise</h3>
        <p>Accompagnement technique pour vos projets de construction.</p>
      </div>
      <div class="service-card">
        <div class="service-icon">📊</div>
        <h3>Études & Devis</h3>
        <p>Études techniques complètes, métrés et devis quantitatifs.</p>
      </div>
      <div class="service-card featured">
        <div class="service-icon">⭐</div>
        <h3>Autres Prestations</h3>
        <p>VRD, assainissement, réhabilitation et aménagement urbain.</p>
      </div>
    </div>
    <div style="text-align:center; margin-top:48px;">
      <a href="{{ route('services') }}" class="btn-primary">Voir tous nos services</a>
    </div>
  </div>
</section>

<!-- À PROPOS APERÇU -->
<section id="about">
  <div class="about-tape">EXPERTISE · QUALITÉ · CONFIANCE · INNOVATION · PROFESSIONNALISME · EXPERTISE · QUALITÉ · CONFIANCE · INNOVATION · PROFESSIONNALISME ·</div>
  <div class="container about-inner">
    <div class="about-visual">
      <div class="about-box box1"></div>
      <div class="about-box box2"></div>
      <div class="about-img-placeholder">
        <p>🏢</p>
        <p>E.G.S BTP/SUARL</p>
      </div>
      <div class="about-badge-float">
        <span>+</span>10 ans<br/>d'expérience
      </div>
    </div>
    <div class="about-text">
      <p class="section-tag">Qui sommes-nous</p>
      <h2 class="section-title">UN BUREAU D'ÉTUDES<br/>À VOTRE SERVICE</h2>
      <div class="title-bar"></div>
      <p class="about-desc">
        <strong>E.G.S BTP/SUARL</strong> est un bureau d'études basé à Dakar, Sénégal. Nous accompagnons particuliers, entreprises et institutions dans la réalisation de leurs projets de construction.
      </p>
      <ul class="about-points">
        <li><span class="check">✔</span> Équipe qualifiée et expérimentée</li>
        <li><span class="check">✔</span> Respect des délais et des budgets</li>
        <li><span class="check">✔</span> Conformité aux normes de construction</li>
        <li><span class="check">✔</span> Suivi personnalisé de chaque projet</li>
      </ul>
      <a href="{{ route('commande') }}" class="btn-primary">Démarrer un projet</a>
    </div>
  </div>
</section>

<!-- CTA COMMANDE -->
<section id="cta">
  <div class="container cta-inner">
    <div>
      <h2>Vous avez un projet de construction ?</h2>
      <p>Demandez un devis gratuit ou passez commande directement en ligne.</p>
    </div>
    <div class="cta-buttons">
      <a href="{{ route('commande') }}?type=devis" class="btn-primary">Demander un Devis</a>
      <a href="{{ route('commande') }}?type=commande" class="btn-ghost">Passer Commande</a>
    </div>
  </div>
</section>

@endsection