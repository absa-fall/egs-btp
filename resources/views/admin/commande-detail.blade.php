<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"/>
  <title>Détail Commande — Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;600&family=Bebas+Neue&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
</head>
<body class="admin-body">
  <div class="admin-layout">
    <aside class="admin-sidebar">
      <div class="sidebar-logo">🦺 EGS BTP</div>
      <nav class="sidebar-nav">
        <a href="{{ route('admin.dashboard') }}">📊 Dashboard</a>
        <a href="{{ route('admin.commandes') }}" class="active">📋 Commandes</a>
        <a href="{{ route('home') }}" target="_blank">🌐 Voir le site</a>
      </nav>
      <form method="POST" action="{{ route('admin.logout') }}" class="sidebar-logout">
        @csrf
        <button type="submit">🚪 Déconnexion</button>
      </form>
    </aside>
    <main class="admin-main">
      <div class="admin-header">
        <h1>Commande — {{ $commande->reference }}</h1>
        <a href="{{ route('admin.commandes') }}" class="btn-ghost">← Retour</a>
      </div>

      @if(session('success'))
        <div class="alert-success">✅ {{ session('success') }}</div>
      @endif

      <div class="detail-grid">
        <!-- INFOS CLIENT -->
        <div class="detail-card">
          <h3>👤 Client</h3>
          <p><strong>Nom :</strong> {{ $commande->client->prenom }} {{ $commande->client->nom }}</p>
          <p><strong>Tél :</strong> <a href="tel:{{ $commande->client->telephone }}">{{ $commande->client->telephone }}</a></p>
          <p><strong>Email :</strong> {{ $commande->client->email ?? '—' }}</p>
          <p><strong>Ville :</strong> {{ $commande->client->ville ?? '—' }}</p>
          <a href="https://wa.me/221{{ ltrim($commande->client->telephone, '+') }}" class="whatsapp-btn" target="_blank">WhatsApp</a>
        </div>

        <!-- INFOS COMMANDE -->
        <div class="detail-card">
          <h3>📋 Commande</h3>
          <p><strong>Service :</strong> {{ $commande->type_service }}</p>
          <p><strong>Type :</strong> {{ $commande->type == 'devis' ? 'Demande de devis' : 'Commande directe' }}</p>
          <p><strong>Localisation :</strong> {{ $commande->localisation ?? '—' }}</p>
          <p><strong>Budget :</strong> {{ $commande->budget ? number_format($commande->budget, 0, ',', ' ').' FCFA' : '—' }}</p>
          <p><strong>Date :</strong> {{ $commande->created_at->format('d/m/Y H:i') }}</p>
          <div class="description-box">
            <strong>Description :</strong>
            <p>{{ $commande->description }}</p>
          </div>
        </div>

        <!-- MISE À JOUR STATUT -->
        <div class="detail-card full-width">
          <h3>⚙️ Mettre à jour le dossier</h3>
          <form action="{{ route('admin.commandes.statut', $commande->id) }}" method="POST">
            @csrf
            <div class="form-row">
              <div class="form-group">
                <label>Statut du dossier</label>
                <select name="statut">
                  <option value="en_attente" {{ $commande->statut=='en_attente'?'selected':'' }}>En attente</option>
                  <option value="en_cours"   {{ $commande->statut=='en_cours'?'selected':'' }}>En cours</option>
                  <option value="termine"    {{ $commande->statut=='termine'?'selected':'' }}>Terminé</option>
                  <option value="annule"     {{ $commande->statut=='annule'?'selected':'' }}>Annulé</option>
                </select>
              </div>
              <div class="form-group">
                <label>Statut paiement</label>
                <select name="paiement">
                  <option value="non_paye" {{ $commande->paiement=='non_paye'?'selected':'' }}>Non payé</option>
                  <option value="partiel"  {{ $commande->paiement=='partiel'?'selected':'' }}>Partiel</option>
                  <option value="paye"     {{ $commande->paiement=='paye'?'selected':'' }}>Payé</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label>Notes internes (admin)</label>
              <textarea name="notes_admin" rows="4" placeholder="Notes visibles uniquement par l'admin...">{{ $commande->notes_admin }}</textarea>
            </div>
            <button type="submit" class="btn-primary">Enregistrer les modifications</button>
          </form>
        </div>
      </div>
    </main>
  </div>
</body>
</html>