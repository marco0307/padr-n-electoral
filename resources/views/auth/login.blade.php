@extends('layouts.layout_guest')
@section('content')
<div class="card position">
<h4 class="l-login">Login</h4>
<form method="POST" action="{{ route('login') }}" autocomplete="off">
    @csrf
    <div class="form-group form-float">
        <div class="form-line">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">
            <label class="form-label">Correo</label>
        </div>
    </div>
    <div class="form-group form-float">
        <div class="form-line">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
            <label class="form-label">Contraseña</label>
        </div>
    </div>
    <div>
        <input type="checkbox" name="remember" class="filled-in chk-col-cyan" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label for="remember">Recordarme</label>
    </div>
    <div>
        @if ($errors->has('email'))
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        @if ($errors->has('password'))
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>
    <button type="submit" class="btn btn-raised g-bg-cyan waves-effect mb-3">Inicia sesión</button>
    <div class="mt-5">
        <div class="alert alert-secondary">
            <strong>CREDENCIALES</strong><hr>
            <p><span class="label bg-blue">Admin</span><i> admin@hotmail.com</i> <br><span class="label bg-light-green">User</span> <i>user@hotmail.com</i></p>
            <hr>
            <p><span class="label bg-teal">Password</span> 123456</p>
        </div>
    </div>
    <!--div class="text-left">
    @if (Route::has('password.request'))
    <a href="{{ route('password.request') }}">
        ¿Olvidaste tu contraseña?
    </a>
    @endif</div-->
</form>
</div>
@endsection
