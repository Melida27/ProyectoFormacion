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
                  <button type="button" class="btn btn-yellow btn-more" data-toggle="modal" data-target="#modalInfoOrders">Administrar Orden</button>
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

        <script src="{{ asset('js/jquery-3.4.1.min.js')}}"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <div class="modal fade" id="modalInfoOrders" tabindex="-1" role="dialog" aria-labelledby="modalInfoOrders" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informacion De La Orden</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="cardInfoOrder">
                    <h5 class="title-info">Información Orden</h5>
                  <div class="subCardInfo">
                      <span><strong>Fecha Creacion:</strong> 13-07-2020</span>
                  </div>
                  <div class="subCardInfo">
                      <span><strong>Estado:</strong> Pendiente</span>
                  </div>
                  <div class="subCardInfo">
                      <span><strong>Fecha Servicio:</strong> 13-07-2020</span>
                  </div>
                  <div class="subCardInfo">
                      <span><strong>Score:</strong> 1</span>
                  </div>
                </div>



                <div class="cardInfoUser">
                <h5 class="title-info">Información Cliente</h5>
                  <div class="subCardInfoUser2">
                      <span><strong>Cliente:</strong> Andres Felipe Ospina Muñoz</span>
                  </div>
                  <div class="subCardInfoUser2">
                      <span><strong>Ciudad:</strong> Manizales</span>
                  </div>
                  <div class="subCardInfoUser2">
                      <span><strong>Direccion:</strong> Calle 51 E # 34 - 17</span>
                  </div>  
                  <div class="subCardInfoUser2">
                      <span><strong>Barrio:</strong> Santos</span>
                  </div>
                  <div class="subCardInfoUser2">
                      <span><strong>Telefono:</strong> 3122660370</span>
                  </div>
                  <div class="subCardInfoUser2">
                      <span><strong>Email:</strong> pipe96-17@hotmail.com</span>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>