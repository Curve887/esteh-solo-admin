<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email -->
    <div class="form-group">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" 
               class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email') }}" required autofocus>
        @error('email')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <!-- Password -->
    <div class="form-group">
        <label for="password">Password</label>
        <input id="password" type="password" name="password"
               class="form-control @error('password') is-invalid @enderror"
               required>
        @error('password')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <!-- Remember Me -->
    <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
        <label class="form-check-label" for="remember_me">Remember me</label>
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-primary btn-block">Login</button>

    <div class="text-center mt-3">
        <span>Belum punya akun?</span>
        <a href="{{ route('register') }}">Register</a>
    </div>
</form>
