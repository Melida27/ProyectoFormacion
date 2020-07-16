  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">

  <link href="{{ asset('css/technical.css') }}" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <body>
    <div class="area">
      <div class="area-orders">
        <div class="area-orders2">

          <h1 class="text-center title-orders"> Lista de Ordenes</h1>

          @foreach ($orders as $order)
          @if($order->status_order == 'Pendiente')
          <div class="card-order bkg_yellow">
            <h3 class="date-order">Fecha Creacion:  {{$order->date_order}}</h3>
            <button type="button" class="btn btn-yellow btn-more btn-admin-order" data-id="{{$order->id}}" data-toggle="modal" data-target="#modalInfoOrders">Administrar Orden</button>
            <h3 class="date-order">Estado:  {{$order->status_order}}</h3>
          </div>
          @elseif($order->status_order == 'Finalizado')
          <div class="card-order bkg_green">
            <h3 class="date-order">Fecha Creacion:  {{$order->date_order}}</h3>
            <button type="button" class="btn btn-green btn-more btn-admin-order" data-id="{{$order->id}}" data-toggle="modal" data-target="#modalInfoOrders">Administrar Orden</button>
            <h3 class="date-order">Estado:  {{$order->status_order}}</h3>
          </div>
          @elseif($order->status_order == 'Rechazado')
          <div class="card-order bkg_red">
            <h3 class="date-order">Fecha Creacion:  {{$order->date_order}}</h3>
            <button type="button" class="btn btn-red btn-more btn-admin-order" data-id="{{$order->id}}" data-toggle="modal" data-target="#modalInfoOrders">Administrar Orden</button>
            <h3 class="date-order">Estado:  {{$order->status_order}}</h3>
          </div>
          @elseif($order->status_order == 'Proceso')
          <div class="card-order bkg_blue">
            <h3 class="date-order">Fecha Creacion:  {{$order->date_order}}</h3>
            <button type="button" class="btn btn-blue btn-more btn-admin-order" data-id="{{$order->id}}" data-toggle="modal" data-target="#modalInfoOrders">Administrar Orden</button>
            <h3 class="date-order">Estado:  {{$order->status_order}}</h3>

          </div>
          @endif
          @endforeach

          {{ $orders->links() }}
        </div>
      </div>
    </div>

    @include('users.technical.technical-menu')

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="{{ asset('js/orders.js')}}"></script>
    <script src="{{ asset('js/sweetalert2@9.js') }}"></script>

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
                <strong>Fecha Creacion: </strong>
                <span id="spn-order-create"></span>
              </div>
              <div class="subCardInfo">
                <strong>Estado: </strong>
                <span id="spn-status-order"></span>
              </div>
              <div class="subCardInfo">
                <strong>Fecha Servicio: </strong> 
                <span id="spn-service-create"></span>
              </div>
              <div class="subCardInfo">
                <strong>Score: </strong>
                <span id="spn-score"></span>
              </div>
            </div>

            <div class="cardInfoOrderDescription">
              <span><strong>Descripcion de la Orden</strong></span>
              <p id="p-order-description" class="order-description"></p>
            </div>

            <div class="cards-notes" id="notes-card">
              <button class="btn btn-success btn-modal" id="btn_new_note">Crear Nota</button>
              <br>
              <br>
              <form id="form-note">
                @csrf

                <div class="form-group">
                  <textarea class="form-control" id="note_order" name="note" rows="3"></textarea>
                </div>
                <input type="hidden" id="order-id" name="fk_order">
              </form>
              <span class="title-notes"><strong>Notas de la Orden</strong></span>
              <br>
              <div id="notes">

              </div>
            </div>

            <div class="buttons-order">
               <button class="btn btn-success btn-modal" id="btn-aceptar-order">Aceptar Orden</button>
               <button class="btn btn-danger btn-modal" id="btn-rechazar-order">Rechazar Orden</button>
               <button class="btn btn-danger final-order btn-modal" id="btn-final-order">Finalizar Orden</button>
              
            </div>

            <div id="calendar">
                 <div class="form-group col-md-6">
                    <label for="end_date">Fecha Disponible</label>
                    <input type="date" name="date_service" class="form-control" id="date-service">
                    <br>
                    <button class="btn btn-info" id="guardar-aceptada">Confirmar</button>
                </div>
                
            </div>



            <div class="cardInfoUser">
              <h5 class="title-info">Información Cliente</h5>
              <div class="subCardInfoUser2">
                <strong>Cliente: </strong>
                <span id="spn-cliente-nombre"></span>
              </div>
              <div class="subCardInfoUser2">
                <strong>Ciudad: </strong>
                <span id="spn-cliente-ciudad"></span>
              </div>
              <div class="subCardInfoUser2">
                <strong>Direccion: </strong>
                <span id="spn-cliente-direccion"></span>
              </div>  
              <div class="subCardInfoUser2">
                <strong>Barrio: </strong>
                <span id="spn-cliente-barrio"></span>
              </div>
              <div class="subCardInfoUser2">
                <strong>Telefono: </strong>
                <span id="spn-cliente-telefono"></span>
              </div>
              <div class="subCardInfoUser2">
                <strong>Email: </strong>
                <span id="spn-cliente-email"></span>
              </div>
            </div>


            <div class="cardInfoService">
              <h5 class="title-info">Información Servicio</h5>
              <div class="subCardInfoService">
                <strong>Nombre: </strong> 
                <span id="spn-name-service"></span>
              </div>
              <div class="subCardInfoService">
                <strong>Descripcion:</strong>
                <span id="spn-description-service"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

