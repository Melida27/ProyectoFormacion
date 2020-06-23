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
						      	<input type="text" name="identification_user" class="form-control @error('identification_user') is-invalid @enderror" id="identification-user" value="{{ $user->identification_user }}">

						      	@error('identification_user')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						    </div>
						</div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-row">
						    <div class="form-group col-md-6">
						      	<label for="first_name">Primer Nombre</label>
						      	<input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" value="{{ $user->first_name }}">

						      	@error('first_name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						    </div>

						    <div class="form-group col-md-6">
						      	<label for="second_name">Segundo Nombre</label>
						      	<input type="text" name="second_name" class="form-control @error('second_name') is-invalid @enderror" id="second_name" value="{{ $user->second_name }}">

						      	@error('second_name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						    </div>
						 </div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-row">
						    <div class="form-group col-md-6">
						      	<label for="first_lastname">Primer Apellido</label>
						      	<input type="text" name="first_lastname" class="form-control @error('first_lastname') is-invalid @enderror" id="first_lastname" value="{{ $user->first_lastname }}">

						      	@error('first_lastname')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						    </div>

						    <div class="form-group col-md-6">
						      	<label for="second_lastname">Segundo Apellido</label>
						      	<input type="text" name="second_lastname" class="form-control @error('second_lastname') is-invalid @enderror" id="second_lastname" value="{{ $user->second_lastname }}">

						      	@error('second_lastname')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						    </div>
						 </div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-row">
							<div class="form-group col-md-6">
						      	<label for="birthdate">Fecha Nacimiento</label>
						      	<input type="date" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" value="{{ $user->birthdate }}">

						      	@error('birthdate')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						    </div>

						    <div class="form-group col-md-6">
						      	<label for="email">Correo Electrónico</label>
						      	<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $user->email }}">

						      	@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						    </div>
						</div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="phone">Teléfono</label>
								<input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ $user->phone }}">

								@error('phone')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>

						   	<div class="form-group col-md-6">
								<label for="gender">Género</label>
								<select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender">
									<option value="">Seleccione...</option>
									<option value="Hombre" @if(old('gender', $user->gender) =='Hombre') selected @endif>Masculino</option>
									<option value="Mujer" @if(old('gender', $user->gender) =='Mujer') selected @endif>Femenino</option>
								</select>

								@error('gender')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						{{-- ********************************************************************************************************* --}}
						<div class="form-row">
						   	<div class="form-group col-md-6">
								<label for="civil_status">Estado Civil</label>
								<select name="civil_status" class="form-control @error('civil_status') is-invalid @enderror" id="civil_status">
									<option value="">Seleccione...</option>
									<option value="Soltero" @if(old('civil_status', $user->civil_status)=='Soltero') selected @endif>Soltero</option>
									<option value="Casado" @if(old('civil_status', $user->civil_status)=='Casado') selected @endif>Casado</option>
									<option value="Otro" @if(old('civil_status', $user->civil_status)=='Otro') selected @endif>Otro</option>
								</select>

								@error('civil_status')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>

							<div class="form-group col-md-6">
								<label for="role">Tipo Usuario</label>
								<select name="role" class="form-control @error('role') is-invalid @enderror" id="role">
									<option value="">Seleccione...</option>
									<option value="Admin" @if(old('role', $user->role )=='Admin') selected @endif>Administrador</option>
									<option value="Cliente" @if(old('role', $user->role )=='Cliente') selected @endif>Cliente</option>
									<option value="Tecnico" @if(old('role', $user->role )=='Tecnico') selected @endif>Técnico</option>
								</select>

								@error('role')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
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

							<button type="button" class="btn btn-success"data-toggle="modal" data-target="#modalNewAddress" >
								<i class="fa fa-plus"></i>
								Nueva Dirección
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


	<div class="modal fade" id="modalNewAddress" tabindex="-1" role="dialog" aria-labelledby="modalNewAddress" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nueva Dirección</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
               <form action="{{ url('edit-user-address') }}" method="post" enctype="multipart/form-data" id="form-address">
				@csrf
				<div class="form-row">
				    <div class="form-group col-md-12">
				      	<input type="hidden" name="fk_user" class="form-control" value="{{$user->id}}">
				    </div>
				</div>
				{{-- ********************************************************************************************************* --}}
				<div class="form-row">
				    <div class="form-group col-md-12">
				      	<label for="address">Dirección</label>
				      	<input type="text" name="address" class="form-control @error('address') is-invalid @enderror">

				      	@error('address')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
				    </div>
				</div>
				{{-- ********************************************************************************************************* --}}
				<div class="form-row">
				    <div class="form-group col-md-12">
				      	<label for="neighborhood">Barrio</label>
				      	<input type="text" name="neighborhood" class="form-control @error('neighborhood') is-invalid @enderror">

				      	@error('neighborhood')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
				    </div>
				</div>
				{{-- ********************************************************************************************************* --}}
				<div class="form-group">
					<label for="departments">Departamentos</label>
					<select name="departments" class="form-control" id="select_departments">
						<option value="">Seleccione Departamento...</option>
					</select>
				</div>
				{{-- ********************************************************************************************************* --}}
				<div class="form-group">
					<label for="fk_municipality">Municipios</label>
					<select name="fk_municipality" id="select_municipalities" class="form-control">
						<option value="">Seleccione Municipio...</option>
					</select>
				</div>
				{{-- ********************************************************************************************************* --}}

				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-custom" id="btn-add-user">
						<i class="fa fa-save"></i>
						Guardar
					</button>
					<button type="reset" class="btn btn-dark" data-dismiss="modal">
						Cancelar
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
	
	@include('menu.menu');

	<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ asset('js/edit-user.js' )}}"></script>
@endsection