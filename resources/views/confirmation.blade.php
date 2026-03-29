@extends('layouts.app')
@section('title', 'Confirmation — E.G.S BTP')
@section('content')

<section class="confirmation-section">
  <div class="container">
    <div class="confirmation-box">
      <div class="confirm-icon">
        <svg viewBox="0 0 64 64" fill="none" width="64" height="64">
          <circle cx="32" cy="32" r="30" stroke="#C9A84C" stroke-width="3"/>
          <path d="M18 32l10 10 18-20" stroke="#C9A84C" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
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

      @php
        $msg  = "*NOUVELLE COMMANDE EGS BTP*\n\n";
        $msg .= "*Client:* " . $commande->client->prenom . " " . $commande->client->nom . "\n";
        $msg .= "*Tel:* " . $commande->client->telephone . "\n";
        $msg .= "*Email:* " . ($commande->client->email ?? 'Non renseigne') . "\n";
        $msg .= "*Ville:* " . ($commande->client->ville ?? 'Non renseignee') . "\n\n";
        $msg .= "*Service:* " . $commande->type_service . "\n";
        $msg .= "*Type:* " . ($commande->type == 'devis' ? 'Demande de devis' : 'Commande directe') . "\n";
        $msg .= "*Localisation:* " . ($commande->localisation ?? 'Non renseignee') . "\n";
        $msg .= "*Budget:* " . ($commande->budget ? number_format($commande->budget,0,',',' ').' FCFA' : 'Non renseigne') . "\n\n";
        $msg .= "*Description:*\n" . $commande->description . "\n\n";
        $msg .= "*Reference:* " . $commande->reference . "\n";
        $msg .= "*Recu le:* " . $commande->created_at->format('d/m/Y H:i');
        $waUrl = "https://wa.me/221784004905?text=" . urlencode($msg);
      @endphp

      <div class="confirm-actions">
        <a href="{{ $waUrl }}" class="whatsapp-btn" target="_blank">Envoyer sur WhatsApp</a>
        <a href="{{ route('commande.suivi') }}" class="btn-primary">Suivre mon dossier</a>
        <a href="{{ route('home') }}" class="btn-ghost">Retour accueil</a>
      </div>
    </div>
  </div>
</section>

@endsection