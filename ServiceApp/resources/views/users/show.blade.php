@extends('layouts.app')
@section('title', 'Consultar Usuario')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-7 offset-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
					    <li class="breadcrumb-item">	
					    	<a href="{{ url('users') }}">
								<i class="fa fa-users"></i>
					    		Lista Usuarios
					    	</a>
					    </li>

					    <li class="breadcrumb-item active" aria-current="page">
					    	<i class="fa fa-search"></i>
					    	Consultar Usuario
					    </li>
					</ol>
				</nav>

				<hr>
				<h1 class="mt-2"><i class="fa fa-search"></i> Consultar Usuario</h1>
				<hr>
				<br>
				
				<input type="hidden" value="{{ $user->id }}" id="id-user">
				
				<table class="table table-striped">
					<tr>
						<td colspan="2" class="text-center">
							<img class="rounded-circle img-thumbnail" src="{{ asset($user->photo) }}" style="width: 14rem; height: 14rem;">
						</td>
					</tr>
					
					<tr>
						<th>Identificación: </th>
						<td>{{ $user->identification_user }}</td>
					</tr>

					<tr>
						<th>Nombre: </th>
						<td>{{ $user->first_name }} {{$user->first_lastname}}</td>
					</tr>

					<tr>  
						<th>Correo Electrónico: </th>
						<td>{{ $user->email }}</td>
					</tr>

					<tr>
						<th>Teléfono: </th>
						<td>{{ $user->phone }}</td>
					</tr>

					<tr>
						<th>Fecha de Nacimiento:</th>
						<td>
							{{ $user->birthdate }}
							{{-- &nbsp; | &nbsp;
							@php use \Carbon\Carbon; @endphp
							{{ Carbon::createFromDate($user->birthdate)->diff(Carbon::now())->format('%y años, %m meses y %d días') }} --}}
						</td>
					</tr>

					<tr>
						<th>Estado Civil: </th>
						<td>{{ $user->civil_status }}</td>
					</tr>

					<tr>
						<th>Genero:</th>
						<td>
							@if ($user->gender == "Mujer")
							Mujer
							@else
							Hombre    
							@endif
						</td>
					</tr>

					<tr>
						<th>Role: </th>
						<td>{{ $user->role }}</td>
					</tr>

					<tr>
						<th>Estado:</th>
						<td>
							@if ($user->status == "1")
								<span class="btn btn-success">Activo</span>
							@else
								<span class="btn btn-danger">Inactivo</span>    
							@endif
						</td>
					</tr>

					<tr>
						<th>Direcciones: </th>
						<td>
							<button type="button" class="btn btn-danger" id="btn-addresses" data-toggle="modal" data-target="#exampleModal">
								<i class="fa fa-address-card"></i>
								Direcciones
							</button>
						</td>
					</tr>
				</table>

				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable modal-xl">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Direcciones</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<div class="modal-body">
								<form action="" id="form-addresses">

								</form>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ asset('js/modalAdress.js' )}}"></script>
	@include('menu.menu');
@endsection