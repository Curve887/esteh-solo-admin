<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/adminlte') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- AdminLTE -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/adminlte') }}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <!-- Logo -->
  <div class="login-logo">
    <a href="#"><b>ES</b> Teh Solo</a>
  </div>

  <!-- Card -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silakan login untuk melanjutkan</p>

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="input-group mb-3">
          <input id="email" type="email" name="email" 
                 class="form-control @error('email') is-invalid @enderror"
                 value="{{ old('email') }}" required autofocus placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
          </div>
          @error('email')
              <span class="invalid-feedback d-block">{{ $message }}</span>
          @enderror
        </div>

        <!-- Password -->
        <div class="input-group mb-3">
          <input id="password" type="password" name="password"
                 class="form-control @error('password') is-invalid @enderror"
                 required placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
          </div>
          @error('password')
              <span class="invalid-feedback d-block">{{ $message }}</span>
          @enderror
        </div>

        <!-- Row with Remember & Button -->
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">Remember Me</label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
        </div>
      </form>

      {{-- <div class="text-center mt-3">
        <span>Belum punya akun?</span>
        <a href="{{ route('register') }}">Register</a>
      </div> --}}
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="{{ asset('assets/vendor/adminlte') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('assets/vendor/adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/vendor/adminlte') }}/dist/js/adminlte.min.js"></script>
</body>
</html>
