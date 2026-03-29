@extends('layouts.app')
@section('title', 'Réalisations — E.G.S BTP')
@section('content')

<section class="page-hero">
  <div class="container">
    <p class="section-tag">Notre portfolio</p>
    <h1 class="section-title">NOS RÉALISATIONS</h1>
    <div class="title-bar"></div>
  </div>
</section>

<section id="realisations-grid">
  <div class="container">
    <div class="projects-grid">
      <div class="project-card tall">
        <div class="project-img">
          <img src="{{ asset('images/projet1.jpg') }}" alt="Projet 1"/>
        </div>
        <div class="project-info">
          <span class="proj-tag">Résidentiel</span>
          <h4>Villa R+2 — Dakar</h4>
        </div>
      </div>
      <div class="project-card">
        <div class="project-img">
          <img src="{{ asset('images/projet2.jpg') }}" alt="Projet 2"/>
        </div>
        <div class="project-info">
          <span class="proj-tag">Commercial</span>
          <h4>Immeuble de Bureaux</h4>
        </div>
      </div>
      <div class="project-card">
        <div class="project-img">
          <img src="{{ asset('images/projet3.jpg') }}" alt="Projet 3"/>
        </div>
        <div class="project-info">
          <span class="proj-tag">Infrastructure</span>
          <h4>Lotissement Résidentiel</h4>
        </div>
      </div>
      <div class="project-card wide">
        <div class="project-img">
          <img src="{{ asset('images/projet4.jpg') }}" alt="Projet 4"/>
        </div>
        <div class="project-info">
          <span class="proj-tag">Institutionnel</span>
          <h4>École & Équipements</h4>
        </div>
      </div>
    </div>
    <p style="text-align:center; color:var(--muted); margin-top:32px; font-size:.9rem;">
      ⚠️ Remplacez les images dans <code>public/images/</code> par vos vraies photos
    </p>
  </div>
</section>

@endsection