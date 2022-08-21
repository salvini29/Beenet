@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-dark" style="margin-top: 40%;">
                <h5 class="card-header">{{ __('Login') }}</h5>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            
                            <div class="col-md-3"></div>

                            <div class="col-md-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background-color:#ADD8E6;"><i class="material-icons">email</i></span>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-3"></div>

                            <div class="col-md-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background-color:#ADD8E6;"><i class="material-icons">lock</i></span>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-3"></div>

                            <div class="col-md-6 ml-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">

                            <div class="col-md-3"></div>

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Loguearse') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
