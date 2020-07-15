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

  @include('users.technical.technical-menu')

        <script src="{{ asset('js/jquery-3.4.1.min.js')}}"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <div class="modal fade" id="modalInfoOrders" tabindex="-1" role="dialog" aria-labelledby="modalInfoOrders" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title title-modal" id="exampleModalLabel">Orden</h5>
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

                <div class="cardInfoOrderDescription">
                  <span><strong>Descripcion de la Orden</strong></span>
                  <p class="order-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis sint porro optio commodi magni sunt laborum facilis placeat ad esse et illo dolore corporis rerum, numquam iusto? Sunt ipsam, veniam.</p>
                </div>

                <div class="buttons-order">
                    <button class="btn btn-success">Aceptar Orden</button>
                    <button class="btn btn-danger">Rechazar Orden</button>
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


                <div class="cardInfoService">
                <h5 class="title-info">Información Servicio</h5>
                  <div class="subCardInfoService">
                      <span><strong>Nombre:</strong> Computacion</span>
                  </div>
                  <div class="subCardInfoService">
                      <span><strong>Descripcion:</strong> Arreglo de computadores</span>
                  </div>
                  </div>



                </div>
              </div>
            </div>
          </div>
        </div>