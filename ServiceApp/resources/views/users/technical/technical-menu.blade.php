  <link href="{{ asset('css/technical.css') }}" rel="stylesheet">
  <nav class="main-menu">
        <ul>
            <li>
                <a href="{{ url('home') }}">
                    <i class="fa fa-home fa-2x"></i>
                    <span class="nav-text">
                        Inicio
                    </span>
                </a>
            </li>

            <li class="has-subnav">
                <a href="{{ url('studies') }}">
                    <i class="fa fa-list fa-2x"></i>
                    <span class="nav-text">
                        Mis Estudios
                    </span>
                </a>
            </li>

            <li class="has-subnav">
                <a href="{{ url('experiences') }}">
                    <i class="fa fa-folder fa-2x"></i>
                    <span class="nav-text">
                        Mis Experiencias
                    </span>
                </a>
            </li>

            <li>
                <a href="{{url('orders')}}">
                    <i class="fa fa-table fa-2x"></i>
                    <span class="nav-text">
                        Mis Ordenes
                    </span>
                </a>
            </li>
        </ul>

        <ul class="logout">
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off fa-2x"></i>
                    <span class="nav-text">
                        Cerrar Sesion
                    </span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>  
        </ul>
    </nav>