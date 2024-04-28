<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Iniciar sesión</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>

<div class="logo-and-form">
  <div class="logo">
    <img src="{{ asset('img/Tekublue.png') }}" alt="teku">
  </div>
    <div class="login-box">
      <h2>Inicio de Sesión</h2>
      <form method="POST" action="{{ route('login.process') }}">
        @csrf
        <div class="user-box">
          <input type="text" name="correo_user" style="font-family: 'Kanit', sans-serif;" required>
          <label>Correo Electrónico</label>
        </div>
        <div class="user-box">
          <input type="password" name="pwd_user" style="font-family: 'Kanit', sans-serif;" required>
          <label>Contraseña</label>
        </div>
        <button type="submit" style="font-family: 'Kanit', sans-serif;">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Entrar
        </button>
      </form>
    </div>
</div>

</body>
</html>

