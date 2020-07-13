  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">

  <link href="{{ asset('css/technical.css') }}" rel="stylesheet">
  <body>
    <div class="area">
        <div class="area-orders">
            <div class="area-orders2">

                <h1 class="text-center title-orders"> Lista de Ordenes</h1>
               
                @foreach ($orders as $order)
              @if($order->status_order == 'Pendiente')
                <div class="card-order bkg_yellow">
                  <h3 class="date-order">Fecha Creacion:  {{$order->date_order}}</h3>
                  <button type="button" class="btn btn-yellow btn-more">Administrar Orden</button>
                  <h3 class="date-order">Estado:  {{$order->status_order}}</h3>
                </div>
              @elseif($order->status_order == 'Finalizado')
                <div class="card-order bkg_green">
                    <h3 class="date-order">Fecha Creacion:  {{$order->date_order}}</h3>
                  <button type="button" class="btn btn-green btn-more">Administrar Orden</button>
                  <h3 class="date-order">Estado:  {{$order->status_order}}</h3>
                </div>
              @elseif($order->status_order == 'Rechazado')
                <div class="card-order bkg_red">
                    <h3 class="date-order">Fecha Creacion:  {{$order->date_order}}</h3>
                  <button type="button" class="btn btn-red btn-more">Administrar Orden</button>
                  <h3 class="date-order">Estado:  {{$order->status_order}}</h3>
                </div>
              @elseif($order->status_order == 'Proceso')
                <div class="card-order bkg_blue">
                  <h3 class="date-order">Fecha Creacion:  {{$order->date_order}}</h3>
                  <button type="button" class="btn btn-blue btn-more">Administrar Orden</button>
                  <h3 class="date-order">Estado:  {{$order->status_order}}</h3>
                  
                </div>
              @endif
              @endforeach

              {{ $orders->links() }}
          </div>
      </div>
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
                    <a href="#">
                       <i class="fa fa-list fa-2x"></i>
                        <span class="nav-text">
                            Forms
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