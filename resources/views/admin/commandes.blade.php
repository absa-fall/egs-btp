<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"/>
  <title>Commandes — Admin EGS BTP</title>
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
        <h1>Toutes les commandes</h1>
      </div>
      <div class="admin-table-wrap">
        <table class="admin-table">
          <thead>
            <tr>
              <th>Référence</th><th>Client</th><th>Service</th>
              <th>Type</th><th>Statut</th><th>Paiement</th><th>Date</th><th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($commandes as $c)
            <tr>
              <td><code>{{ $c->reference }}</code></td>
              <td>{{ $c->client->prenom }} {{ $c->client->nom }}<br/><small>{{ $c->client->telephone }}</small></td>
              <td>{{ $c->type_service }}</td>
              <td>{{ $c->type == 'devis' ? '📋 Devis' : '🚀 Commande' }}</td>
              <td><span class="badge-statut badge-{{ $c->statut }}">{{ $c->statutLabel() }}</span></td>
              <td><span class="badge-statut badge-{{ $c->paiement }}">{{ $c->paiementLabel() }}</span></td>
              <td>{{ $c->created_at->format('d/m/Y') }}</td>
              <td><a href="{{ route('admin.commandes.show', $c->id) }}" class="btn-sm">Gérer</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="pagination-wrap">{{ $commandes->links() }}</div>
      </div>
    </main>
  </div>
</body>
</html>