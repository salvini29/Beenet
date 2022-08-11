@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-dark" style="margin-top: 40%;">
                <h5 class="card-header">{{ __('Registro') }}</h5>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-3"></div>

                            <div class="col-md-6 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1" style="background-color:#ADD8E6;"><i class="material-icons">person</i></span>
                                </div>                                
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre">

                                @error('name')
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
                                    <span class="input-group-text" id="basic-addon1" style="background-color:#ADD8E6;"><i class="material-icons">email</i></span>
                                </div>                                
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Mail">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">

                                @error('password')
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
                                    <span class="input-group-text" id="basic-addon1" style="background-color:#ADD8E6;"><i class="material-icons">sync_lock</i></span>
                                </div>                                
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña">
                            </div>
                        </div>

                        <div class="row mb-0">

                            <div class="col-md-3"></div>

                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registro') }}
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
