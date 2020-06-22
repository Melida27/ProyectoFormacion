<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
</head>
<body id="bg-login">
    <div id="login-button">
        <img src="{{ asset('imgs/user-login.png') }}"></img>
    </div>

    <div id="container">
        <div>
            <h4 class="mt-4 text-center">
                <i class="fa fa-lock"></i>
                {{ __('custom.title-login') }}
            </h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="col-form-label text-md-right">{{ __('custom.email') }}</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror  
                </div>

                <div class="form-group">
                    <label for="password" class="col-form-label text-md-right">{{ __('custom.password') }}</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autofocus>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <button type="button" class="btn btn-custom">
                        <a href="{{ url('/') }}">
                            <i class="fa fa-arrow-left"></i>
                            {{ __('custom.btn-back') }}
                        </a>
                    </button>

                    <button type="submit" class="btn btn-custom">
                        {{ __('custom.btn-login') }}
                        <i class="fa fa-arrow-right"></i>
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('custom.password-request') }}
                        </a>
                    @endif      
                </div>

               <div class="login hr-border"></div>
               <div class="login hr-text">
                    <a href="{{ route('register') }}">
                        <i class="fa fa-user"></i> 
                         Registrarse
                    </a>
                </div>
               <div class="login hr-border"></div>
            </form>
        </div>
    </div>


    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
