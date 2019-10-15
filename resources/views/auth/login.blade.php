@extends('layouts.layout_guest')
@section('content')
<div class="card position">
<h4 class="l-login">Login</h4>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group form-float">
        <div class="form-line">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
            <label class="form-label">Correo</label>
        </div>
    </div>
    <div class="form-group form-float">
        <div class="form-line">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
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
    <button type="submit" class="btn btn-raised g-bg-cyan waves-effect">Inicia sesión</button>
    <!--div class="text-left">
    @if (Route::has('password.request'))
    <a href="{{ route('password.request') }}">
        ¿Olvidaste tu contraseña?
    </a>
    @endif</div-->
</form>
</div>
@endsection
