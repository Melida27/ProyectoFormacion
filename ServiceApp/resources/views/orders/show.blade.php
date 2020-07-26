@extends('layouts.app')
@section('title', 'Consultar Orden')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-7 offset-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
					    <li class="breadcrumb-item">	
					    	<a href="{{ url('/order-index') }}">
								<i class="fa fa-list"></i>
					    		Lista Ordenes
					    	</a>
					    </li>

					    <li class="breadcrumb-item active" aria-current="page">
					    	<i class="fa fa-search"></i>
					    	Consultar Orden
					    </li>
					</ol>
				</nav>

				<hr>
				<h1 class="mt-2"><i class="fa fa-search"></i> Consultar Orden</h1>
				<hr>
				{{-- ********************************************************************************************** --}}
				<h5><i class="fa fa-business-time"></i> Datos Orden</h5>
				<br>
				<table class="table table-striped">
					<tr>
						<th>Fecha Orden: </th>
						<td>{{ $order[0]->date_order }}</td>
					</tr>

					<tr>
						<th>Fecha servicio: </th>
						<td>{{ $order[0]->date_service }}</td>
					</tr>

					<tr>
						<th>Estado Orden:</th>
						@if ($order[0]->status_order == "Pendiente")
							<td><span class="badge badge-warning">{{ $order[0]->status_order }}</span></td>
						@elseif($order[0]->status_order == "Proceso")
							<td><span class="badge badge-info">{{ $order[0]->status_order }}</span></td>
						@elseif($order[0]->status_order == "Finalizado")
							<td><span class="badge badge-success">{{ $order[0]->status_order }}</span></td>
						@elseif($order[0]->status_order == "Rechazado" || $order[0]->status_order == "Cancelado" )
							<td><span class="badge badge-danger">{{ $order[0]->status_order }}</span></td>
						@else
							<td>{{ $order[0]->status_order }}</td>
						@endif
						
					</tr>

					<tr>
						<th>Descripción:</th>
						<td>{{ $order[0]->order_description }}</td>
					</tr>

					<tr>
						<th>Puntuación:</th>
						<td>{{ $order[0]->score }}</td>
					</tr>
				</table>
				{{-- ********************************************************************************************** --}}
				<hr>
				<h5><i class="fa fa-user"></i> Datos Cliente</h5>
				<br>
				<table class="table table-striped">
					<tr>
						<th>Nombre Completo: </th>
						<td>{{ $order[0]->client_first_name }} {{ $order[0]->client_second_name }} {{ $order[0]->client_first_lastname }} {{ $order[0]->client_second_lastname }}</td>
					</tr>

					<tr>
						<th>Correo Electrónico: </th>
						<td>{{ $order[0]->client_email }}</td>
					</tr>

					<tr>
						<th>Teléfono:</th>
						<td>{{ $order[0]->client_phone }}</td>
					</tr>

					<tr>
						<th>Dirección:</th>
						<td>{{ $order[0]->address }} | {{ $order[0]->neighborhood }} | {{ $order[0]->client_municipality }}</td>
					</tr>
				</table>
				{{-- ********************************************************************************************** --}}
				<hr>
				<h5><i class="fa fa-list"></i> Datos Servicio</h5>
				<br>
				<table class="table table-striped">
					<tr>
						<th>Servicio: </th>
						<td>{{ $order[0]->name_service }}</td>
					</tr>

					<tr>
						<th>Descripción:</th>
						<td>{{ $order[0]->description }}</td>
					</tr>
				</table>
				{{-- ********************************************************************************************** --}}
				<hr>
				<h5><i class="fa fa-user"></i> Datos Técnico</h5>
				<br>
				<table class="table table-striped">
					<tr>
						<th>Nombre Completo: </th>
						<td>{{ $order[0]->first_name }} {{ $order[0]->second_name }} {{ $order[0]->first_lastname }} {{ $order[0]->second_lastname }}</td>
					</tr>

					<tr>
						<th>Correo Electrónico: </th>
						<td>{{ $order[0]->email }}</td>
					</tr>

					<tr>
						<th>Teléfono:</th>
						<td>{{ $order[0]->phone }}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
	@include('menu.menu');
@endsection