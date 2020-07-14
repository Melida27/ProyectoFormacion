   <!-- Fonts -->
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link href="{{ asset('css/technical.css') }}" rel="stylesheet">
  <body>
    <div class="area">
      <h1 class="text-center">estudios</h1>
    </div>

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
                    <a href="#">
                        <i class="fa fa-laptop fa-2x"></i>
                        <span class="nav-text">
                            Stars Components
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
                    <a href="#">
                       <i class="fa fa-folder-open fa-2x"></i>
                        <span class="nav-text">
                            Pages
                        </span>
                    </a>
                   
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-bar-chart-o fa-2x"></i>
                        <span class="nav-text">
                            Graphs and Statistics
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-font fa-2x"></i>
                        <span class="nav-text">
                           Quotes
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
                <li>
                   <a href="#">
                        <i class="fa fa-map-marker fa-2x"></i>
                        <span class="nav-text">
                            Maps
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                       <i class="fa fa-info fa-2x"></i>
                        <span class="nav-text">
                            Documentation
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
        
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/sweetalert2@9.js') }}"></script>

        <script>
            $(document).ready(function() {
                /* ----------------------------------------------------------------------------- */
                @if(session('message'))
                Swal.fire({
                    title: 'Felicitaciones',
                    text: '{{ session('message') }}',
                    icon: 'success',
                    confirmButtonColor: '#00796b',
                });
                @endif

                /* ----------------------------------------------------------------------------- */

                @if(session('error'))
                Swal.fire({
                    title: 'Error',
                    text: '{{ session('error') }}',
                    icon: 'error',
                    confirmButtonColor: '#00796b',
                });
                @endif

                /* ----------------------------------------------------------------------------- */
            });
        </script>