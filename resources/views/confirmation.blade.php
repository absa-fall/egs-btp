@extends('layouts.app')
@section('title', 'Confirmation — E.G.S BTP')
@section('content')

<section class="confirmation-section">
  <div class="container">
    <div class="confirmation-box">
      <div class="confirm-icon">✅</div>
      <h2>Demande envoyée avec succès !</h2>
      <p>Merci <strong>{{ $commande->client->prenom }} {{ $commande->client->nom }}</strong>, votre demande a bien été enregistrée.</p>

      <div class="ref-box">
        <span>Votre numéro de référence</span>
        <strong>{{ $commande->reference }}</strong>
        <p>Cliquez pour copier</p>
      </div>

      <div class="confirm-details">
        <div><span>Service</span><strong>{{ $commande->type_service }}</strong></div>
        <div><span>Type</span><strong>{{ $commande->type == 'devis' ? 'Demande de devis' : 'Commande' }}</strong></div>
        <div><span>Statut</span><strong class="badge-attente">En attente</strong></div>
      </div>

      <p class="confirm-note">Notre équipe vous contactera dans les <strong>24 heures</strong> au <strong>{{ $commande->client->telephone }}</strong></p>

      {{-- BOUTON WHATSAPP PRÉ-REMPLI --}}
      @php
        $message = "🦺 *NOUVELLE COMMANDE EGS BTP*\n\n";
        $message .= "👤 *Client:* " . $commande->client->prenom . " " . $commande->client->nom . "\n";
        $message .= "📱 *Tél:* " . $commande->client->telephone . "\n";
        $message .= "✉️ *Email:* " . ($commande->client->email ?? 'Non renseigné') . "\n";
        $message .= "📍 *Ville:* " . ($commande->client->ville ?? 'Non renseignée') . "\n\n";
        $message .= "🏗️ *Service:* " . $commande->type_service . "\n";
        $message .= "📋 *Type:* " . ($commande->type == 'devis' ? 'Demande de devis' : 'Commande directe') . "\n";
        $message .= "📍 *Localisation:* " . ($commande->localisation ?? 'Non renseignée') . "\n";
        $message .= "💰 *Budget:* " . ($commande->budget ? number_format($commande->budget, 0, ',', ' ') . ' FCFA' : 'Non renseigné') . "\n\n";
        $message .= "📝 *Description:*\n" . $commande->description . "\n\n";
        $message .= "🔖 *Référence:* " . $commande->reference . "\n";
        $message .= "⏰ *Reçu le:* " . $commande->created_at->format('d/m/Y à H\hi');
        $whatsappUrl = "https://wa.me/221784004905?text=" . urlencode($message);
      @endphp

      <div class="confirm-actions">
        <a href="{{ $whatsappUrl }}" class="whatsapp-btn" target="_blank">
          📱 Envoyer sur WhatsApp
        </a>
        <a href="{{ route('commande.suivi') }}" class="btn-primary">Suivre mon dossier</a>
        <a href="{{ route('home') }}" class="btn-ghost">Retour à l'accueil</a>
      </div>

    </div>
  </div>
</section>

@endsection