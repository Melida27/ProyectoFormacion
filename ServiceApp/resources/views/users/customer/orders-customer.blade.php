<link rel="stylesheet" href="{{ asset('css/customer.css') }}">
@extends('layouts.app')
@section('title', 'Ordenes Cliente')

@section('content')

<div class="orders-container">
	<h1 class="text-center title-orders"><i class="fas fa-list"></i> Lista de Ordenes</h1>
	@foreach ($orders as $order)
	@if($order->status_order == 'Pendiente')
	<div class="card card-order">
        <div class="card-body">
            <h5>Orden - {{$order->id}}</h5>
            <span class="badge badge-warning">{{$order->status_order}}</span>
            <span class="badge badge-secondary">Fecha Creacion: {{$order->date_order}}</span>
            <hr>
            <a href="" class="btn btn-dark btn-admin-order" data-id="{{$order->id}}" data-toggle="modal" data-target="#modalInfoOrders">Ver Mas</a>
            <form style="display: inline-block;" action="/change-status" method="POST">
            	@csrf
            	@method('PUT')
            	<input type="hidden" name="id_order" value="{{$order->id}}">
            	<input type="hidden" name="value" value="Cancelado">
            	<button type="submit" class="btn btn-danger">Cancelar</button>
            </form>
        </div>
    </div>
    @elseif($order->status_order == 'Proceso')
	<div class="card card-order">
        <div class="card-body">
            <h5>Orden - {{$order->id}}</h5>
            <span class="badge badge-info">{{$order->status_order}}</span>
            <span class="badge badge-secondary">Fecha Creacion: {{$order->date_order}}</span>
            <hr>
            <a href="" class="btn btn-dark btn-admin-order" data-id="{{$order->id}}" data-toggle="modal" data-target="#modalInfoOrders">Ver Mas</a>
        </div>
    </div>
    @elseif($order->status_order == 'Finalizado')
	<div class="card card-order">
        <div class="card-body">
            <h5>Orden - {{$order->id}}</h5>
            <span class="badge badge-success">{{$order->status_order}}</span>
            <span class="badge badge-secondary">Fecha Creacion: {{$order->date_order}}</span>
            <hr>
            <a href="" class="btn btn-dark btn-admin-order" data-id="{{$order->id}}" data-toggle="modal" data-target="#modalInfoOrders">Ver Mas</a>
        </div>
    </div>
    @elseif($order->status_order == 'Rechazado' || $order->status_order == 'Cancelado')
	<div class="card card-order">
        <div class="card-body">
            <h5>Orden - {{$order->id}}</h5>
            <span class="badge badge-danger">{{$order->status_order}}</span>
            <span class="badge badge-secondary">Fecha Creacion: {{$order->date_order}}</span>
            <hr>
            <a href="" class="btn btn-dark btn-admin-order" data-id="{{$order->id}}" data-toggle="modal" data-target="#modalInfoOrders">Ver Mas</a>
        </div>
    </div>
    @endif
	@endforeach
		{{ $orders->links() }}
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js/customer.js') }}"></script>
@endsection


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
              <h5 class="title-info">Información Tecnico</h5>
              <div class="subCardInfoUser2">
                <strong>Tecnico: </strong>
                <span id="spn-cliente-nombre"></span>
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