@extends('layouts.app')
@section('title', 'Confirmation — E.G.S BTP')
@section('content')

<section class="confirmation-section">
  <div class="container">
    <div class="confirmation-box">
      <div class="confirm-icon">✅</div>
      <h2>Demande envoyée avec succès !</h2>
      <p>Merci <strong>{{ $commande->client->prenom }} {{ $commande->client->nom }}</strong>, votre demande a bien été reçue.</p>

      <div class="ref-box">
        <span>Votre numéro de référence</span>
        <strong>{{ $commande->reference }}</strong>
        <p>Conservez ce numéro pour suivre votre dossier</p>
      </div>

      <div class="confirm-details">
        <div><span>Service</span><strong>{{ $commande->type_service }}</strong></div>
        <div><span>Type</span><strong>{{ $commande->type == 'devis' ? 'Demande de devis' : 'Commande' }}</strong></div>
        <div><span>Statut</span><strong class="badge-attente">En attente</strong></div>
      </div>

      <p class="confirm-note">Notre équipe vous contactera dans les <strong>24 heures</strong> au <strong>{{ $commande->client->telephone }}</strong></p>

      <div class="confirm-actions">
        <a href="{{ route('commande.suivi') }}" class="btn-primary">Suivre mon dossier</a>
        <a href="{{ route('home') }}" class="btn-ghost">Retour à l'accueil</a>
      </div>

      <a href="https://wa.me/221784004905?text=Bonjour, ma référence est {{ $commande->reference }}" class="whatsapp-btn" target="_blank">
        📱 Contacter via WhatsApp
      </a>
    </div>
  </div>
</section>
@endsection