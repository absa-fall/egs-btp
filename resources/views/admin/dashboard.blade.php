<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"/>
  <title>Dashboard — Admin EGS BTP</title>
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;600&family=Bebas+Neue&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
</head>
<body class="admin-body">

  <div class="admin-layout">
    <!-- SIDEBAR -->
    <aside class="admin-sidebar">
      <div class="sidebar-logo">🦺 EGS BTP</div>
      <nav class="sidebar-nav">
        <a href="{{ route('admin.dashboard') }}" class="active">📊 Dashboard</a>
        <a href="{{ route('admin.commandes') }}">📋 Commandes</a>
        <a href="{{ route('home') }}" target="_blank">🌐 Voir le site</a>
      </nav>
      <form method="POST" action="{{ route('admin.logout') }}" class="sidebar-logout">
        @csrf
        <button type="submit">🚪 Déconnexion</button>
      </form>
    </aside>

    <!-- MAIN -->
    <main class="admin-main">
      <div class="admin-header">
        <h1>Dashboard</h1>
        <span>Bienvenue, {{ auth()->user()->name }}</span>
      </div>

      <!-- STATS -->
      <div class="admin-stats">
        <div class="admin-stat-card">
          <span class="stat-number">{{ $stats['total'] }}</span>
          <span class="stat-label">Total Commandes</span>
        </div>
        <div class="admin-stat-card orange">
          <span class="stat-number">{{ $stats['en_attente'] }}</span>
          <span class="stat-label">En Attente</span>
        </div>
        <div class="admin-stat-card blue">
          <span class="stat-number">{{ $stats['en_cours'] }}</span>
          <span class="stat-label">En Cours</span>
        </div>
        <div class="admin-stat-card green">
          <span class="stat-number">{{ $stats['termines'] }}</span>
          <span class="stat-label">Terminés</span>
        </div>
      </div>

      <!-- DERNIÈRES COMMANDES -->
      <div class="admin-table-wrap">
        <div class="admin-table-header">
          <h2>Dernières commandes</h2>
          <a href="{{ route('admin.commandes') }}" class="btn-primary">Voir tout</a>
        </div>
        <table class="admin-table">
          <thead>
            <tr>
              <th>Référence</th>
              <th>Client</th>
              <th>Service</th>
              <th>Type</th>
              <th>Statut</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($recentes as $c)
            <tr>
              <td><code>{{ $c->reference }}</code></td>
              <td>{{ $c->client->prenom }} {{ $c->client->nom }}</td>
              <td>{{ $c->type_service }}</td>
              <td>{{ $c->type == 'devis' ? '📋 Devis' : '🚀 Commande' }}</td>
              <td><span class="badge-statut badge-{{ $c->statut }}">{{ $c->statutLabel() }}</span></td>
              <td>{{ $c->created_at->format('d/m/Y') }}</td>
              <td><a href="{{ route('admin.commandes.show', $c->id) }}" class="btn-sm">Voir</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>