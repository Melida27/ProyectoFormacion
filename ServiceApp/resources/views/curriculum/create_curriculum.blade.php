<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Curriculum</title>
	<link rel="stylesheet" href="{{ asset('css/curriculum.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5 container-forms">
				<h2 class="text-center mt-3"><i class="fa fa-id-card"></i> Hoja de vida</h2>
				<hr>

				<form action="{{ url('curriculums') }}" method="post">
					@csrf
					<h5><i class="fa fa-user"></i>  Datos Personales</h5>
					<br>
					{{-- ********************************************************************************************************* --}}
					<div class="form-row">
						<div class="form-group col-md-3">
							<label for="identification_user">Identificación</label>
							<input type="text" name="identification_user" class="form-control" id="identification_user" value="{{ Auth::user()->identification_user }}">
						</div>

						<div class="form-group col-md-3">
							<label for="first_name">Primer Nombre</label>
							<input type="text" name="first_name" class="form-control" id="first_name" value="{{ Auth::user()->first_name }}">
						</div>

						<div class="form-group col-md-3">
							<label for="second_name">Segundo Nombre</label>
							<input type="text" name="second_name" class="form-control" id="second_name" value="{{ Auth::user()->second_name }}">
						</div>

						<div class="form-group col-md-3">
							<label for="first_lastname">Primer Apellido</label>
							<input type="text" name="first_lastname" class="form-control" id="first_lastname" value="{{ Auth::user()->first_lastname }}">
						</div>
					</div>
					{{-- ********************************************************************************************************* --}}
					<div class="form-row">
						<div class="form-group col-md-3">
							<label for="second_lastname">Segundo Apellido</label>
							<input type="text" name="second_lastname" class="form-control" id="second_lastname" value="{{ Auth::user()->second_lastname }}">
						</div>

						<div class="form-group col-md-3">
							<label for="birthdate">Fecha Nacimiento</label>
							<input type="date" name="birthdate" class="form-control" id="birthdate" value="{{ Auth::user()->birthdate }}">
						</div>

						<div class="form-group col-md-3">
							<label for="email">Correo Electrónico</label>
							<input type="email" name="email" class="form-control" id="email" value="{{ Auth::user()->email }}">
						</div>

						<div class="form-group col-md-3">
							<label for="phone">Teléfono</label>
							<input type="number" name="phone" class="form-control" id="phone" value="{{ Auth::user()->phone }}">
						</div>
					</div>
					{{-- ********************************************************************************************************* --}}
					<div class="form-row">
						<div class="form-group col-md-3">
							<label for="gender">Género</label>
							<select name="gender" class="form-control" id="gender">
								<option value="">Seleccione...</option>
								<option value="Hombre" @if(old('gender', Auth::user()->gender) =='Hombre') selected @endif>Masculino</option>
								<option value="Mujer" @if(old('gender', Auth::user()->gender) =='Mujer') selected @endif>Femenino</option>
							</select>
						</div>

						<div class="form-group col-md-3">
							<label for="civil_status">Estado Civil</label>
							<select name="civil_status" class="form-control" id="civil_status">
								<option value="">Seleccione...</option>
								<option value="Soltero" @if(old('civil_status', Auth::user()->civil_status)=='Soltero') selected @endif>Soltero</option>
								<option value="Casado" @if(old('civil_status', Auth::user()->civil_status)=='Casado') selected @endif>Casado</option>
								<option value="Otro" @if(old('civil_status', Auth::user()->civil_status)=='Otro') selected @endif>Otro</option>
							</select>
						</div>
					</div>

					<hr>
					{{-- ********************************************************************************************************* --}}

					<h5><i class="fa fa-list"></i>  Servicios a Postularse</h5>
					<br>

					<input type="hidden" name="fk_user" value="{{ Auth::user()->id }}" id="fk_user">
					
					<div class="form-check" id="options-services">
						
					</div>

					<div class="form-row">
						<div class="form-group col-md-4 ml-4">
							<label for="experience">Experiencia en la labor seleccionada</label>
							<input type="text" name="experience" class="form-control" id="experience">
						</div>
					</div>
					<br>

					<hr>
					{{-- ********************************************************************************************************* --}}

					<h5><i class="fa fa-graduation-cap"></i>  Datos Académicos</h5>
					<br>

					<div class="form-row">
						<div class="form-group col-md-3">
							<label for="institution">Institución</label>
							<input type="text" name="institution" class="form-control" id="institution">
						</div>

						<div class="form-group col-md-3">
							<label for="type">Tipo de Estudio</label>
							<input type="text" name="type" class="form-control" id="type">
						</div>

						<div class="form-group col-md-3">
							<label for="title">Título Obtenido</label>
							<input type="text" name="title" class="form-control" id="title">
						</div>

						<div class="form-group col-md-3">
							<label for="end_date">Fecha Finalización</label>
							<input type="date" name="end_date" class="form-control" id="end_date">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="description">Descripción</label>
							<textarea class="form-control" name="description" rows="3"></textarea>
						</div>
					</div>

					<hr>
					{{-- ********************************************************************************************************* --}}

					<h5><i class="fa fa-briefcase"></i>  Experiencia laboral</h5>
					<br>

					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="company_name">Nombre Empresa</label>
							<input type="text" name="company_name" class="form-control" id="company_name">
						</div>

						<div class="form-group col-md-4">
							<label for="position">Cargo</label>
							<input type="text" name="position" class="form-control" id="position">
						</div>

						<div class="form-group col-md-4">
							<label for="time_experience_company">Tiempo Laborado</label>
							<input type="text" name="time_experience_company" class="form-control" id="time_experience_company">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="description_experience">Descripción</label>
							<textarea class="form-control" name="description_experience" rows="3"></textarea>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group ml-2">
							<button type="submit" class="btn btn-custom">
								<i class="fa fa-save"></i>
								Guardar
							</button>
							<button type="reset" class="btn btn-dark">
								<i class="fa fa-eraser"></i>
								Limpiar
							</button>
						</div>
					</div>
				</form>
				{{-- ********************************************************************************************************* --}}
			</div>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="{{ asset('js/sweetalert2@9.js') }}"></script>
	<script src="{{ asset('js/curriculum.js') }}"></script>	

	<script>
		$(document).ready(function() {
                /* ----------------------------------------------------------------------------- */
                @if(session('message'))
                Swal.fire({
                    title: 'Felicitaciones',
                    text: '{{ session('message') }}',
                    icon: 'success',
                    confirmButtonColor: '#00796b',
                });
                @endif

                /* ----------------------------------------------------------------------------- */

                @if(session('error'))
                Swal.fire({
                    title: 'Error',
                    text: '{{ session('error') }}',
                    icon: 'error',
                    confirmButtonColor: '#920D0D',
                });
                @endif

                /* ----------------------------------------------------------------------------- */
            });
	</script>
</body>
</html>