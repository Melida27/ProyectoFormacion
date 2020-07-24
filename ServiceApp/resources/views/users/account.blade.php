@extends('layouts.app')
@section('title', 'Mi Cuenta')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-account animate__animated animate__fadeIn">
            	 <div class="card-header header-image">
            	 	<a class="photo-account" data-toggle="modal" data-target="#exampleModal" href="#exampleModal">
                      <img class="img-thumbnail photo-size" src="{{ asset(Auth::user()->photo) }}" width="130px" height="170px">
                      <i class="fa fa-camera icon-camera"></i>
                    </a>
            	 </div>
            	 <div class="card-body body-account">
            	 	<h2 class="h2-account"><i class="fas fa-users-cog"></i> Mis Datos</h2>
            	 	<button type="button" class="btn btn-dark btn-edit" id="btn-edit-1">Editar</button>
            	 	
            	 	<form class="form-account" action="{{ url('account-update/'.Auth::user()->id) }}" method="post" enctype="multipart/form-data">
        	 		@csrf
					@method('PUT')


					{{-- ********************************************************************************************************* --}}

					
					<br>
					
        	 		 <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="inputFirstName">Primer Nombre</label>
					      <input name="first_name" class="form-control input-form  @error('first_name') is-invalid @enderror" id="inputFirstName" type="text" value="{{Auth::user()->first_name}}" readonly>
					      @error('first_name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						  @enderror
					    </div>


					    <div class="form-group col-md-6">
					      <label for="inputFirstLastName">Primer Apellido</label>
					      <input name="first_lastname" class="form-control input-form @error('first_lastname') is-invalid @enderror" id="inputFirstLastName" type="text" value="{{Auth::user()->first_lastname}}" readonly>

					      @error('first_lastname')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					    </div>
					 </div>

					 {{-- ********************************************************************************************************* --}}

					 <div class="form-row">
					    <div class="form-group col-md-6">
					      <label for="inputSecondName">Segundo Nombre</label>
					      <input name="second_name" class="form-control input-form @error('second_name') is-invalid @enderror" id="inputSecondName" type="text" value="{{Auth::user()->second_name}}" readonly>
					      @error('second_name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						  @enderror
					    </div>
					    <div class="form-group col-md-6">
					      <label for="inputSecondLastName">Segundo Apellido</label>
					      <input name="second_lastname" class="form-control input-form  @error('second_lastname') is-invalid @enderror" id="inputSecondLastName" type="text" value="{{Auth::user()->second_lastname}}" readonly>
					      @error('second_lastname')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						  @enderror
					    </div>
					 </div>


					 {{-- ********************************************************************************************************* --}}

					 <div class="form-row">
					    <div class="form-group col-md-4">
					      <label for="inputBirthdate">Fecha Nacimiento</label>
					      <input class="form-control" id="inputBirthdate" type="text" value="{{Auth::user()->birthdate}}" readonly>
					    </div>
					    <div class="form-group col-md-4">
					      <label for="inputEmail">Correo Electronico</label>
					      <input name="email" class="form-control input-form @error('email') is-invalid @enderror" id="inputEmail" type="text" value="{{Auth::user()->email}}" readonly>
					      @error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						  @enderror
					    </div>
					    <div class="form-group col-md-4">
					      <label for="inputPhone">Telefono</label>
					      <input  name="phone" class="form-control input-form @error('phone') is-invalid @enderror" id="inputPhone" type="text" value="{{Auth::user()->phone}}" readonly>

					      @error('phone')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						  @enderror
					    </div>
					 </div>

                    {{-- ********************************************************************************************************* --}}


					 <div class="form-row">
					    <div class="form-group col-md-4">
					      <label for="inputCivilStatus">Estado Civil</label>

					      <select name="civil_status" class="form-control @error('civil_status') is-invalid @enderror" id="inputCivilStatus" disabled>
							<option value="">Seleccione...</option>
							<option value="Soltero" @if(old('civil_status', Auth::user()->civil_status)=='Soltero') selected @endif>Soltero</option>
							<option value="Casado" @if(old('civil_status', Auth::user()->civil_status)=='Casado') selected @endif>Casado</option>
							<option value="Otro" @if(old('civil_status', Auth::user()->civil_status)=='Otro') selected @endif>Otro</option>
						  </select>

					      

					      @error('civil_status')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						  @enderror
					    </div>
					    <div class="form-group col-md-4">
					      <label for="inputGender">Genero</label>
					      <input class="form-control" id="inputGender" type="text" value="{{Auth::user()->gender}}" readonly>
					    </div>
					    <div class="form-group col-md-4">
					      <label for="inputRol">Tipo Usuario</label>
					      <input class="form-control" id="inputRol" type="text" value="{{Auth::user()->role}}" readonly>
					    </div>
					 </div>
                    <div class="form-row">
						<button type="button" class="btn btn-danger btn-cancel" id="btn-cancel-1">Cancelar</button>
					    <button type="submit" class="btn btn-success btn-confirm" id="btn-confirm-1">Confirmar</button>
					</div>
					 
            	 	</form>

            	 	<button type="button" class="btn btn-danger" id="btn-addresses" data-toggle="modal" data-target="#modalDirecciones" data-id="{{Auth::user()->id}}">
						<i class="fa fa-address-card"></i>
						Direcciones
					</button>

					<button type="button" class="btn btn-success"data-toggle="modal" data-target="#modalNewAddress" >
						<i class="fa fa-plus"></i>
						Nueva Dirección
					</button>
            	 </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar Imágen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('update-photo') }}" method="post" enctype="multipart/form-data">
		    @csrf
			@method('PUT')				
			<div class="form-group">
				<div class="text-center @error('photo') is-invalid @enderror">
					<img id="preview" class="img-thumbnail" src="{{ asset('imgs/no-photo.png') }}" width="120px">
				</div>
                <br>
				<button class="btn btn-block btn-custom btn-upload" type="button">
					<i class="fa fa-upload"></i>
					Seleccionar Imágen
				</button>
				<input type="file" name="photo" id="photo" class="d-none" accept="image/*">

				@error('photo')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			<div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-dark">Guardar</button>
      </div>
		</form>
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="modalDirecciones" tabindex="-1" role="dialog" aria-labelledby="modalDirecciones" aria-hidden="true">
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
               <form action="{{ url('address-account') }}" method="post" enctype="multipart/form-data" id="form-address">
						@csrf
						<div class="form-row">
						    <div class="form-group col-md-12">
						      	<input type="hidden" name="fk_user" class="form-control" value="{{Auth::user()->id}}">
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

<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{asset('js/account.js')}}"></script>

@if(Auth::user()->role == 'Admin')
@include('menu.menu');
@endif  
@endsection