<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Teku S.A.</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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
          <input type="text" name="correo_user" required="">
          <label>Correo Electronico</label>
        </div>
        <div class="user-box">
          <input type="password" name="pwd_user" required="">
          <label>Contraseña</label>
        </div>
        <button type="submit">
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

