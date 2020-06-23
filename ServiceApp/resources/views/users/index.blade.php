@extends('layouts.app')
@section('title', 'Lista de Usuarios')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<h1 class="mt-2"><i class="fa fa-users"></i> Lista de Usuarios</h1>
				<hr>
				<a href="{{ url('users/create') }}" class="btn btn-custom">
					<i class="fa fa-plus"></i> 
					Adicionar Usuario
				</a>

				<a href="{{ url('generate/pdf/users') }}" class="btn btn-danger">
					<i class="fa fa-file-pdf"></i> 
					Reporte PDF
				</a>
				
				<div class="box">
					<div class="container-2">
					    <span class="icon"><i class="fa fa-search"></i></span>
					    <input type="hidden" id="tmodel" value="users">
					    <input type="search" id="qsearch" autocomplete="off" placeholder="Buscar...">
					</div>
				</div>
                
				<div class="loader text-center d-none">
				<br>
                <br>
				  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				     width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
				    <rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
				      <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s" repeatCount="indefinite" />
				      <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
				      <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
				    </rect>
				    <rect x="8" y="10" width="4" height="10" fill="#333"  opacity="0.2">
				      <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
				      <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
				      <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
				    </rect>
				    <rect x="16" y="10" width="4" height="10" fill="#333"  opacity="0.2">
				      <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
				      <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
				      <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
				    </rect>
				  </svg>

				</div>

				<br>
				<hr>

				@if(count($users) > 0)
					<table class="table table-striped table-hover ">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Correo Electrónico</th>
								<th>Teléfono</th>
								<th class="text-center">Estado</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody id="content">
							@foreach ($users as $user)
								<tr>
									<td>{{ $user->first_name }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->phone }}</td>

									<td class="text-center">
										@if ($user->status == "1")
											<i class="fa fa-check text-success"></i>
										@else
											<i class="fa fa-times text-danger"></i> 
										@endif
									</td>

									<td>
										<a href="{{ url('users/'.$user->id )}}" class="btn btn-sm btn-custom">
											<i class="fa fa-search"></i>
										</a>

										<a href="{{ url('users/'.$user->id.'/edit/')}}" class="btn btn-sm btn-custom btn-edit-user" data-id="{{ $user->id }}">
											<i class="fa fa-pen"></i>
										</a>

										<form action="{{ url('users/desactivar/'.$user->id) }}" method="post" style="display: inline-block;">
											@csrf
											@method('PUT')
											<button type="button" class="btn btn-sm btn-custom-danger btn-desactivar">
												<i class="fa fa-ban"></i>
											</button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					<h4>No hay usuarios registrados...</h4>
				@endif
				
				{{ $users->links() }}
			</div>
		</div>
	</div>
	@include('menu.menu');
@endsection