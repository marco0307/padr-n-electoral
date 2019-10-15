@extends('layouts.layout_guest')
@section('content')
<div class="card">
    <h4 class="l-login">Forgot Password? <div class="msg">Enter your e-mail address below to reset your password.</div></h4>
    <div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
    </div>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group form-float">
            <div class="form-line">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                <label class="form-label">Email</label>
            </div>
        </div>    
        <div>
            @if ($errors->has('email'))
                <span class="invalid-feedback text-danger" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>        
        <div class="row">                    
            <div class="col-sm-12">
                <button type="submit" class="btn btn-raised waves-effect g-bg-cyan">RESTABLECER MI CONTRASEÑA</button>
            </div>
            <div class="col-sm-12"><a href="{{url('/')}}">Inicia sesión</a></div>
        </div>
    </form>
</div>
@endsection
