<link rel="stylesheet" href="{{ asset('css/customer.css') }}">
@extends('layouts.app')
@section('title', 'Ordenes Cliente')

@section('content')
<h1 class="text-center title-orders"><i class="fas fa-list"></i> Lista de Ordenes</h1>

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

@endsection