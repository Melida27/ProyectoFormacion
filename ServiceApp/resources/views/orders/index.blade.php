@extends('layouts.app')
@section('title', 'Lista de Ordenes')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<h1 class="mt-2"><i class="fa fa-list"></i> Lista de Ordenes</h1>
				<hr>

                @if(count($orders) > 0)
					<table class="table table-striped table-hover ">
						<thead>
							<tr>
								<th>Fecha Orden</th>
								<th>Fecha servicio</th>
								<th>Estado Orden</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody id="content">
							@foreach ($orders as $order)
								<tr>
									<td>
										{{ $order->date_order }}
									</td>
									
									@if($order->date_service !== null)
									<td>
										{{ $order->date_service }}
									</td>
									@else
									<td>
										N/A
									</td>
									@endif

									<td>
										@if ($order->status_order == "Pendiente")
											<span class="badge badge-warning">{{ $order->status_order }}</span>
										@elseif($order->status_order == "Proceso")
											<span class="badge badge-info">{{ $order->status_order }}</span>
										@elseif($order->status_order == "Finalizado")
											<span class="badge badge-success">{{ $order->status_order }}</span>
										@elseif($order->status_order == "Rechazado" || $order->status_order == "Cancelado" )
											<span class="badge badge-danger">{{ $order->status_order }}</span>
										@else
											{{ $order->status_order }}
										@endif
									</td>

									<td>
										<a href="{{ url('/order-show/'.$order->id) }}" class="btn btn-sm btn-custom">
											<i class="fa fa-search"></i>
										</a>

									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					<h4>No hay ordenes disponibles...</h4>
				@endif
				
				{{ $orders->links() }}
			</div>
		</div>
	</div>
@endsection
@include('menu.menu')