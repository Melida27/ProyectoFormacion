@extends('layouts.app')
@section('title', 'Lista de Ordenes')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<h1 class="mt-2"><i class="fa fa-list"></i> Lista de Ordenes</h1>
				<hr>
				<a href="#" class="btn btn-custom">
					<i class="fa fa-plus"></i> 
					Adicionar Orden
				</a>
				
				<br>
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
									
									<td>
										{{ $order->date_service }}
									</td>

									<td>
										{{ $order->status_order }}
									</td>

									<td>
										<a href="#" class="btn btn-sm btn-custom">
											<i class="fa fa-search"></i>
										</a>

										<a href="#" class="btn btn-sm btn-custom">
											<i class="fa fa-pen"></i>
										</a>

										<form action="{{ url('orders/'.$order->id) }}" method="post" style="display: inline-block;">
											@csrf
											@method('delete')
											<button type="button" class="btn btn-sm btn-custom-danger btn-delete">
												<i class="fa fa-trash"></i>
											</button>
										</form>
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