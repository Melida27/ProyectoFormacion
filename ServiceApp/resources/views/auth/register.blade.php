<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
</head>
<body id="bg-register">
    <div id="register-button">
        <img src="{{ asset('imgs/user-login.png') }}"></img>
    </div>

    <div id="container" class="scroll">
        <div>
            <h4 class="mt-4 text-center">
                <i class="fa fa-user"></i>
                {{ __('custom.title-register') }}
            </h4>
        </div>

        <div class="card-body ">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="identification_user">Cédula Ciudadanía</label>
                        <input type="text" name="identification_user" class="form-control @error('identification_user') is-invalid @enderror" id="identification-user" value="{{ old('identification_user') }}">

                        @error('identification_user')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- ********************************************************************************************************* --}}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="first_name">Primer Nombre</label>
                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" value="{{ old('first_name') }}">

                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="second_name">Segundo Nombre</label>
                        <input type="text" name="second_name" class="form-control @error('second_name') is-invalid @enderror" id="second_name" value="{{ old('second_name') }}">

                        @error('second_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- ********************************************************************************************************* --}}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="first_lastname">Primer Apellido</label>
                        <input type="text" name="first_lastname" class="form-control @error('first_lastname') is-invalid @enderror" id="first_lastname" value="{{ old('first_lastname') }}">

                        @error('first_lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="second_lastname">Segundo Apellido</label>
                        <input type="text" name="second_lastname" class="form-control @error('second_lastname') is-invalid @enderror" id="second_lastname" value="{{ old('second_lastname') }}">

                        @error('second_lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- ********************************************************************************************************* --}}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="birthdate">Fecha Nacimiento</label>
                        <input type="date" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" value="{{ old('birthdate') }}">

                        @error('birthdate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- ********************************************************************************************************* --}}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone">Teléfono</label>
                        <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone') }}">

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="gender">Género</label>
                        <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender">
                            <option value="">Seleccione...</option>
                            <option value="Hombre" @if(old('gender')=='Hombre') selected @endif>Masculino</option>
                            <option value="Mujer" @if(old('gender')=='Mujer') selected @endif>Femenino</option>
                        </select>

                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- ********************************************************************************************************* --}}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="civil_status">Estado Civil</label>
                        <select name="civil_status" class="form-control @error('civil_status') is-invalid @enderror" id="civil_status">
                            <option value="">Seleccione...</option>
                            <option value="Soltero" @if(old('civil_status')=='Soltero') selected @endif>Soltero</option>
                            <option value="Casado" @if(old('civil_status')=='Casado') selected @endif>Casado</option>
                            <option value="Otro" @if(old('civil_status')=='Otro') selected @endif>Otro</option>
                        </select>

                        @error('civil_status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="role">Tipo Usuario</label>
                        <select name="role" class="form-control @error('role') is-invalid @enderror" id="role">
                            <option value="">Seleccione...</option>
                            <option value="Cliente" @if(old('role')=='Cliente') selected @endif>Cliente</option>
                            <option value="Tecnico" @if(old('role')=='Tecnico') selected @endif>Técnico</option>
                        </select>

                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- ********************************************************************************************************* --}}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" id="password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="password_confirmation">Confirmar Contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Contraseña" id="password_confirmation">
                    </div>
                </div>
                {{-- ********************************************************************************************************* --}}
                <div class="form-group row mb-0">
                    <div class="ml-3">
                        <a href="{{ route('login') }}" class="btn btn-login">
                            <i class="fa fa-lock"></i>
                            Ingresar
                        </a>
                        <button type="submit" class="btn btn-custom">
                            <i class="fa fa-user"></i>
                            Registrarse
                        </button>
                    </div>
                </div>
                {{-- ********************************************************************************************************* --}}
            </form>
        </div>
    </div>


    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/register.js') }}"></script>
</body>
</html>
