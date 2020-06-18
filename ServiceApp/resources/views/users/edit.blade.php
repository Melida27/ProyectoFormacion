@extends('layouts.app')
@section('title', 'Modificar Usuario')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
					    <li class="breadcrumb-item">	
					    	<a href="{{ url('users') }}">
								<i class="fa fa-users"></i>
					    		Lista Usuarios
					    	</a>
					    </li>

					    <li class="breadcrumb-item active" aria-current="page">
					    	<i class="fa fa-pen"></i>
					    	Modificar Usuario
					    </li>
					</ol>
				</nav>
				<hr>
				<h1 class="mt-2"><i class="fa fa-pen"></i> Modificar Usuario</h1>
				<hr>

				<div>
					<form action="{{ url('users/'.$user->id) }}" method="post" enctype="multipart/form-data">

						@csrf
						@method('PUT')
						<input type="hidden" value="{{ $user->id }}" id="id-user">
						{{-- ********************************************************************************************************* --}}
						<div class="form-row">
						    <div class="form-group col-md-12">
						      	<label for="identification_user">Cédula Ciudadanía</label>
						      	<input type="text" name="identification_user" class="form-control" id="identification-user" value="{{ $user->identification_user }}" required>
						    </div>
						</div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-row">
						    <div class="form-group col-md-6">
						      	<label for="first_name">Primer Nombre</label>
						      	<input type="text" name="first_name" class="form-control" id="first_name" value="{{ $user->first_name }}" required>
						    </div>

						    <div class="form-group col-md-6">
						      	<label for="second_name">Segundo Nombre</label>
						      	<input type="text" name="second_name" class="form-control" id="second_name" value="{{ $user->second_name }}">
						    </div>
						 </div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-row">
						    <div class="form-group col-md-6">
						      	<label for="first_lastname">Primer Apellido</label>
						      	<input type="text" name="first_lastname" class="form-control" id="first_lastname" value="{{ $user->first_lastname }}" required>
						    </div>

						    <div class="form-group col-md-6">
						      	<label for="second_lastname">Segundo Apellido</label>
						      	<input type="text" name="second_lastname" class="form-control" id="second_lastname" value="{{ $user->second_lastname }}" required>
						    </div>
						 </div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-row">
							<div class="form-group col-md-6">
						      	<label for="birthdate">Fecha Nacimiento</label>
						      	<input type="date" name="birthdate" class="form-control" id="birthdate" value="{{ $user->birthdate }}" required>
						    </div>

						    <div class="form-group col-md-6">
						      	<label for="email">Correo Electrónico</label>
						      	<input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" required>
						    </div>
						</div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="phone">Teléfono</label>
								<input type="number" name="phone" class="form-control" id="phone" value="{{ $user->phone }}" required>
							</div>

						   	<div class="form-group col-md-6">
								<label for="gender">Género</label>
								<select name="gender" class="form-control" id="gender" required>
									<option value="">Seleccione...</option>
									<option value="Hombre" @if(old('gender', $user->gender) =='Hombre') selected @endif>Masculino</option>
									<option value="Mujer" @if(old('gender', $user->gender) =='Mujer') selected @endif>Femenino</option>
								</select>
							</div>
						</div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-row">
						   	<div class="form-group col-md-6">
								<label for="civil_status">Estado Civil</label>
								<select name="civil_status" class="form-control" id="civil_status" required>
									<option value="">Seleccione...</option>
									<option value="Soltero" @if(old('civil_status', $user->civil_status)=='Soltero') selected @endif>Soltero</option>
									<option value="Casado" @if(old('civil_status', $user->civil_status)=='Casado') selected @endif>Casado</option>
									<option value="Otro" @if(old('civil_status', $user->civil_status)=='Otro') selected @endif>Otro</option>
								</select>
							</div>

							<div class="form-group col-md-6">
								<label for="role">Tipo Usuario</label>
								<select name="role" class="form-control" id="role" required>
									<option value="">Seleccione...</option>
									<option value="Admin" @if(old('role', $user->role )=='Admin') selected @endif>Administrador</option>
									<option value="Cliente" @if(old('role', $user->role )=='Cliente') selected @endif>Cliente</option>
									<option value="Tecnico" @if(old('role', $user->role )=='Tecnico') selected @endif>Técnico</option>
								</select>
							</div>
						</div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-group">
							<button type="submit" class="btn btn-custom" >
								<i class="fa fa-save"></i>
								Modificar
							</button>
							<button type="reset" class="btn btn-dark">
								<i class="fa fa-eraser"></i>
								Limpiar
							</button>
							<button type="button" class="btn btn-danger" id="btn-addresses" data-toggle="modal" data-target="#exampleModal">
								<i class="fa fa-address-card"></i>
								Direcciones
							</button>
						</div>
					</form>
					{{-- ********************************************************************************************************* --}}
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
	</div>
	
	@include('menu.menu');

	<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ asset('js/modalAdress.js' )}}"></script>
@endsection