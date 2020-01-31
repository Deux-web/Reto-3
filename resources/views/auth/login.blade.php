@extends('layout_html')
@section('head')
    <title>Todas las incidencias</title>
    <style>
        body {
            background-image: url({{asset('images/fondo_login.jpg')}});
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .transparentito {
            opacity: 97%;
        }
    </style>
@endsection
@section('contenido')
    <div class="container d-flex align-self-center justify-content-around mt-5">
        <div class="col-lg-5 offset-lg-1 align-self-center d-none d-lg-block">
            <img src="{{asset('images/road-tech-assistance.png')}}" alt="">
        </div>
        <div class="col-10 col-lg-5 offset-lg-1 transparentito">
            <div class="card">
                <div class="card-header"><h3 class="m-0 p-0">Iniciar sesión</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">Email: </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">Password: </label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Recuérdame
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 d-flex justify-content-center">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary w-100 ml-auto mr-auto">
                                    {{ __('Login') }}
                                </button>
                                <!--
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
