<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"/>
  <title>Admin — E.G.S BTP</title>
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;600&family=Bebas+Neue&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
</head>
<body class="admin-body">
  <div class="admin-login-wrap">
    <div class="admin-login-box">
      <div class="admin-logo">🦺 E.G.S BTP</div>
      <h2>Espace Administration</h2>
      @if($errors->any())
        <div class="alert-error">
          @foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach
        </div>
      @endif
      <form method="POST" action="{{ route('admin.login.post') }}">
        @csrf
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" required autofocus/>
        </div>
        <div class="form-group">
          <label>Mot de passe</label>
          <input type="password" name="password" required/>
        </div>
        <button type="submit" class="btn-primary btn-full">Se connecter</button>
      </form>
    </div>
  </div>
</body>
</html>