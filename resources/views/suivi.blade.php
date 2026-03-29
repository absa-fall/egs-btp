@extends('layouts.app')
@section('title', 'Suivi — E.G.S BTP')
@section('content')

<section class="page-hero">
  <div class="container">
    <p class="section-tag">Votre dossier</p>
    <h1 class="section-title">SUIVI DE COMMANDE</h1>
    <div class="title-bar"></div>
  </div>
</section>

<section class="suivi-section">
  <div class="container">
    <form action="{{ route('commande.rechercher') }}" method="POST" class="suivi-form">
      @csrf
      <label>Entrez votre numéro de référence</label>
      <div class="suivi-input-row">
        <input type="text" name="reference" placeholder="Ex: EGS-6789ABCD..." value="{{ old('reference') }}" required/>
        <button type="submit" class="btn-primary">Rechercher</button>
      </div>
    </form>

    @isset($commande)
      @if($commande)
        <div class="suivi-result">
          <div class="suivi-header">
            <div>
              <p class="section-tag">Référence : {{ $commande->reference }}</p>
              <h3>{{ $commande->type_service }}</h3>
            </div>
            <span class="badge-statut badge-{{ $commande->statut }}">
              {{ $commande->statutLabel() }}
            </span>
          </div>

          <!-- TIMELINE -->
          <div class="timeline">
            <div class="tl-step {{ in_array($commande->statut, ['en_attente','en_cours','termine']) ? 'done' : '' }}">
              <div class="tl-dot"></div>
              <div class="tl-content"><strong>Demande reçue</strong><span>Votre dossier a été enregistré</span></div>
            </div>
            <div class="tl-step {{ in_array($commande->statut, ['en_cours','termine']) ? 'done' : '' }}">
              <div class="tl-dot"></div>
              <div class="tl-content"><strong>En cours de traitement</strong><span>Notre équipe travaille sur votre projet</span></div>
            </div>
            <div class="tl-step {{ $commande->statut == 'termine' ? 'done' : '' }}">
              <div class="tl-dot"></div>
              <div class="tl-content"><strong>Projet terminé</strong><span>Votre projet a été finalisé</span></div>
            </div>
          </div>

          <div class="suivi-infos">
            <div><span>Client</span><strong>{{ $commande->client->prenom }} {{ $commande->client->nom }}</strong></div>
            <div><span>Téléphone</span><strong>{{ $commande->client->telephone }}</strong></div>
            <div><span>Type</span><strong>{{ $commande->type == 'devis' ? 'Demande de devis' : 'Commande' }}</strong></div>
            <div><span>Paiement</span><strong>{{ $commande->paiementLabel() }}</strong></div>
            <div><span>Date</span><strong>{{ $commande->created_at->format('d/m/Y') }}</strong></div>
          </div>
        </div>
      @else
        <div class="alert-error"><p>⚠️ Aucune commande trouvée avec cette référence.</p></div>
      @endif
    @endisset
  </div>
</section>
@endsection