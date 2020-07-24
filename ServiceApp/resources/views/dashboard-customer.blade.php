
<link rel="stylesheet" href="{{ asset('css/customer.css') }}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
<link href="{{ asset('css/search.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>

<nav class="navbar navbar-expand-md navbar-dark bg-custom shadow-sm">
	<div class="container">
		<a class="navbar-brand" href="{{ url('/') }}">
			{{ config('app.name', 'Laravel') }}
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Left Side Of Navbar -->
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="{{ url('home') }}">
						<i class="fa fa-home"></i>
						Inicio
					</a>
				</li>
			</ul>

			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ml-auto">
				<!-- Authentication Links -->
				@guest
				<li class="nav-item">
					<a class="nav-link" href="{{ route('login') }}">
						<i class="fa fa-lock"></i>
						{{ __('custom.login') }}
					</a>
				</li>
				<li class="nav-item"><span class="nav-link">|</span></li>
				@if (Route::has('register'))
				<li class="nav-item">
					<a class="nav-link" href="{{ route('register') }}">
						<i class="fa fa-user"></i>
						{{ __('custom.register') }}
					</a>
				</li>
				@endif
				@else
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						{{ Auth::user()->first_name.' '.Auth::user()->first_lastname }} <span class="caret"></span>
						<img class="rounded-circle" src="{{ asset(Auth::user()->photo) }}" width="30" height="30">
					</a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						@if (Auth::user()->role == "Admin")
						<a class="dropdown-item" href="{{ url('account') }}">
							<i class="fa fa-user"></i> 
							Mi perfil
						</a>
						<a class="dropdown-item" href="{{ url('users') }}">
							<i class="fa fa-users"></i> 
							Módulo Usuarios
						</a>
						<a class="dropdown-item" href="{{ url('categories') }}">
							<i class="fa fa-columns"></i> 
							Módulo Categorías
						</a>
						<a class="dropdown-item" href="{{ url('services') }}">
							<i class="fa fa-list"></i> 
							Módulo Servicios
						</a>
						<a class="dropdown-item" href="{{ url('orders') }}">
							<i class="fa fa-business-time"></i> 
							Módulo Pedidos
						</a>
						@elseif (Auth::user()->role == "Cliente")
						<a class="dropdown-item" href="{{ url('account') }}">
							<i class="fa fa-user"></i> 
							Mi perfil
						</a>
						<a class="dropdown-item" href="{{ url('/orders-customer') }}">
							<i class="fa fa-business-time"></i> 
							Mis Pedidos
						</a>
						<a class="dropdown-item" href="{{ url('/allCategories') }}">
							<i class="fa fa-list"></i> 
							Catalogo
						</a>
						@endif

						<div class="dropdown-divider"></div>

						<a class="dropdown-item" href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						<i class="fa fa-times"></i>
						{{ __('custom.logout') }}
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</div>
			</li>
			@endguest
		</ul>
	</div>
</div>
</nav>
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/sweetalert2@9.js') }}"></script>

<div class="container-body">
	
	<img class="img-customer" src="{{ asset('imgs/customer-home.svg') }}">
</div>
