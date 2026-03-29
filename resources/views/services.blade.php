@extends('layouts.app')
@section('title', 'Services — E.G.S BTP')
@section('content')

<section class="page-hero">
  <div class="container">
    <p class="section-tag">Ce que nous proposons</p>
    <h1 class="section-title">NOS SERVICES</h1>
    <div class="title-bar"></div>
  </div>
</section>

<section id="services-full">
  <div class="container">
    <div class="services-detail">

      <div class="service-detail-card">
        <div class="sd-icon">🏗️</div>
        <div class="sd-content">
          <h3>Génie Civil & BTP</h3>
          <p>Nous intervenons sur tous types de projets de construction : villas, immeubles, bâtiments industriels, ouvrages d'art. Notre équipe assure la conception structurelle, le calcul béton armé, la supervision et le contrôle qualité du chantier.</p>
          <ul>
            <li>Calcul de structures béton armé</li>
            <li>Supervision et direction de chantier</li>
            <li>Contrôle qualité des travaux</li>
            <li>Réception des ouvrages</li>
          </ul>
          <a href="{{ route('commande') }}?service=genie-civil" class="btn-primary">Commander ce service</a>
        </div>
      </div>

      <div class="service-detail-card reverse">
        <div class="sd-icon">📐</div>
        <div class="sd-content">
          <h3>Plans Architecturaux</h3>
          <p>Conception de plans d'architecture complets et détaillés pour vos projets de construction. Nous produisons des documents techniques professionnels conformes aux normes en vigueur au Sénégal.</p>
          <ul>
            <li>Plans de masse et de situation</li>
            <li>Plans de façades et coupes</li>
            <li>Plans d'exécution détaillés</li>
            <li>Permis de construire</li>
          </ul>
          <a href="{{ route('commande') }}?service=plans-arch" class="btn-primary">Commander ce service</a>
        </div>
      </div>

      <div class="service-detail-card">
        <div class="sd-icon">🔨</div>
        <div class="sd-content">
          <h3>Exécution des Travaux</h3>
          <p>Nous prenons en charge l'exécution complète de vos travaux de construction, de rénovation et d'aménagement avec rigueur, qualité et respect des délais convenus.</p>
          <ul>
            <li>Construction neuve tous corps d'état</li>
            <li>Rénovation et réhabilitation</li>
            <li>Aménagement intérieur</li>
            <li>Travaux de finition</li>
          </ul>
          <a href="{{ route('commande') }}?service=execution" class="btn-primary">Commander ce service</a>
        </div>
      </div>

      <div class="service-detail-card reverse">
        <div class="sd-icon">💡</div>
        <div class="sd-content">
          <h3>Conseils & Expertise</h3>
          <p>Notre bureau vous accompagne dans la prise de décisions techniques et stratégiques pour vos projets immobiliers et de construction. Expertise indépendante et objective.</p>
          <ul>
            <li>Audit technique de bâtiments</li>
            <li>Expertise contradictoire</li>
            <li>Assistance à maîtrise d'ouvrage</li>
            <li>Conseil en investissement immobilier</li>
          </ul>
          <a href="{{ route('commande') }}?service=conseils" class="btn-primary">Commander ce service</a>
        </div>
      </div>

      <div class="service-detail-card">
        <div class="sd-icon">📊</div>
        <div class="sd-content">
          <h3>Études & Devis</h3>
          <p>Élaboration d'études techniques complètes, métrés précis, devis quantitatifs et estimatifs pour tous types de projets de construction.</p>
          <ul>
            <li>Métrés et avant-métrés</li>
            <li>Devis quantitatif et estimatif</li>
            <li>Études de faisabilité</li>
            <li>Dossier d'appel d'offres</li>
          </ul>
          <a href="{{ route('commande') }}?service=etudes" class="btn-primary">Commander ce service</a>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection