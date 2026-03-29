@extends('layouts.app')
@section('title', 'Commander — E.G.S BTP')
@section('content')

<section class="page-hero">
  <div class="container">
    <p class="section-tag">Démarrez votre projet</p>
    <h1 class="section-title">PASSER UNE COMMANDE</h1>
    <div class="title-bar"></div>
  </div>
</section>

<section id="commande-section">
  <div class="container">

    <div class="type-choice">
      <button type="button" class="type-btn active" onclick="setType('devis', this)">
        <span>📋</span>
        <strong>Demande de Devis</strong>
        <p>Gratuit — Recevez une estimation de prix</p>
      </button>
      <button type="button" class="type-btn" onclick="setType('commande', this)">
        <span>🚀</span>
        <strong>Passer Commande</strong>
        <p>Démarrez votre projet directement</p>
      </button>
    </div>

    <form action="{{ route('commande.store') }}" method="POST" class="commande-form">
      @csrf
      <input type="hidden" name="type" id="typeInput" value="devis"/>

      @if($errors->any())
        <div class="alert-error">
          @foreach($errors->all() as $error)
            <p>⚠️ {{ $error }}</p>
          @endforeach
        </div>
      @endif

      <div class="form-section">
        <h3>👤 Vos Informations</h3>
        <div class="form-row">
          <div class="form-group">
            <label>Nom *</label>
            <input type="text" name="nom" value="{{ old('nom') }}" placeholder="Votre nom" required/>
          </div>
          <div class="form-group">
            <label>Prénom *</label>
            <input type="text" name="prenom" value="{{ old('prenom') }}" placeholder="Votre prénom" required/>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label>Téléphone *</label>
            <input type="tel" name="telephone" value="{{ old('telephone') }}" placeholder="+221 XX XXX XX XX" required/>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="votre@email.com"/>
          </div>
        </div>
        <div class="form-group">
          <label>Ville / Localité</label>
          <input type="text" name="ville" value="{{ old('ville') }}" placeholder="Ex: Dakar, Thiès..."/>
        </div>
      </div>

      <div class="form-section">
        <h3>🏗️ Votre Projet</h3>
        <div class="form-row">
          <div class="form-group">
            <label>Type de service *</label>
            <select name="type_service" required>
              <option value="">Sélectionner...</option>
              <option value="Génie Civil & BTP" {{ old('type_service')=='Génie Civil & BTP'?'selected':'' }}>Génie Civil & BTP</option>
              <option value="Plans Architecturaux" {{ old('type_service')=='Plans Architecturaux'?'selected':'' }}>Plans Architecturaux</option>
              <option value="Exécution des Travaux" {{ old('type_service')=='Exécution des Travaux'?'selected':'' }}>Exécution des Travaux</option>
              <option value="Conseils & Expertise" {{ old('type_service')=='Conseils & Expertise'?'selected':'' }}>Conseils & Expertise</option>
              <option value="Études & Devis" {{ old('type_service')=='Études & Devis'?'selected':'' }}>Études & Devis</option>
              <option value="Autre" {{ old('type_service')=='Autre'?'selected':'' }}>Autre</option>
            </select>
          </div>
          <div class="form-group">
            <label>Localisation du projet</label>
            <input type="text" name="localisation" value="{{ old('localisation') }}" placeholder="Adresse ou zone du projet"/>
          </div>
        </div>
        <div class="form-group">
          <label>Budget estimé (FCFA)</label>
          <input type="number" name="budget" value="{{ old('budget') }}" placeholder="Ex: 5000000"/>
        </div>
        <div class="form-group">
          <label>Description du projet *</label>
          <textarea name="description" rows="6" placeholder="Décrivez votre projet en détail..." required>{{ old('description') }}</textarea>
        </div>
      </div>

      <button type="submit" class="btn-primary btn-full btn-lg">
        Envoyer ma demande →
      </button>
      <p class="form-note">✅ Nous vous contactons sous 24h · Devis gratuit et sans engagement</p>
    </form>

  </div>
</section>

@endsection

@section('scripts')
<script>
function setType(type, el) {
  document.getElementById('typeInput').value = type;
  document.querySelectorAll('.type-btn').forEach(b => b.classList.remove('active'));
  el.classList.add('active');
}

document.addEventListener('DOMContentLoaded', () => {
  const params = new URLSearchParams(window.location.search);
  if (params.get('type') === 'commande') {
    const btns = document.querySelectorAll('.type-btn');
    if (btns.length >= 2) setType('commande', btns[1]);
  }
  const serviceParam = params.get('service');
  if (serviceParam) {
    const sel = document.querySelector('select[name="type_service"]');
    if (sel) {
      [...sel.options].forEach(o => {
        if (o.value.toLowerCase().replace(/\s/g,'-').includes(serviceParam)) o.selected = true;
      });
    }
  }
});
</script>
@endsection