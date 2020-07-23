<link href="{{ asset('css/customer.css') }}" rel="stylesheet">

@extends('layouts.app')
@section('title', 'Tecnicos')

@section('content')
<div class="container">
	@foreach ($technicals as $technical)
        <div class="card-technical">
           <div class="card-technical-header">
           	<img class="photo-technical" src="{{ asset($technical->photo) }}">
           </div>
           <div class="card-technical-body">
           	<p class="technical-name">{{$technical->first_name}}  {{$technical->first_lastname}}</p>
           	<div class="contact-number">
           	  <p class="technical-name">Número de Contacto</p>
           	  <p class="technical-name">{{$technical->phone}}</p> 
           	</div>
           	<div class="actions">
           	  <span class="txt-span">Ver Mas: </span><a href="" class="btn btn-info btn-info-technical" data-id="{{$technical->id_curriculum}}" data-toggle="modal" data-target="#modalInfoTechnical"><i class="fa fa-search"></i></a>
           	  <br>
           	  <br>
           	  <span class="txt-span">Solicitar: </span><a href="" class="btn btn-danger btn-final-order" data-id="{{Auth::user()->id}}" id-tech="{{$technical->id}}" id-service="{{$technical->id_service}}" data-toggle="modal" data-target="#modalContinueOrder"><i class="fa fa-shopping-cart"></i></a>
           	</div>
           </div>
		</div>
	@endforeach
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js/customer.js') }}"></script>
<script src="{{ asset('js/sweetalert2@9.js') }}"></script>

<!-- Modal -->
<div class="modal fade" id="modalInfoTechnical" tabindex="-1" role="dialog" aria-labelledby="modalInfoTechnicallLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informacion Técnico</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-info-technical">
        	<h5 class="title-sections">Información Personal</h5>
            <table class="table table-striped">
			  <tbody>
			    <tr>
			      <th>Identifiacion: </th>
			      <td class="identification_technical"></td>
			      <th>Nombre: </th>
			      <td class="name_technical"></td>
			    </tr>
			    <tr>
			      <th>Email: </th>
			      <td class="email_technical"></td>
			      <th>Telefono: </th>
			      <td class="phone_technical"></td>
			    </tr>
			    <tr>
			      <th>Fecha Nacimiento: </th>
			      <td class="birthdate_technical"></td>
			      <th>Genero: </th>
			      <td class="gender_technical"></td>
			    </tr>
			    <tr>
			      <th>Años Experiencia: </th>
			      <td class="experience_technical"></td>
			    </tr>
			  </tbody>
			</table>
        </div>
        <div class="container-info-studies">
        	<h5 class="title-sections">Estudios</h5>
        	<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">Institución</th>
			      <th scope="col">Tipo Estudio</th>
			      <th scope="col">Titulo Obtenido</th>
			      <th scope="col">Fecha Fin</th>
			    </tr>
			  </thead>
			  <tbody class="tbody_studies">

			  </tbody>
			</table>
        </div>
        <div class="container-info-experiences">
        	<h5 class="title-sections">Experiencia Laboral</h5>
        	<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">Compañia</th>
			      <th scope="col">Cargo</th>
			      <th scope="col">Años Trabajados</th>
			      <th scope="col">Descripción Cargo</th>
			    </tr>
			  </thead>
			  <tbody class="tbody_experiences">
			    
			  </tbody>
			</table>
        </div>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalContinueOrder" tabindex="-1" role="dialog" aria-labelledby="modalContinueOrderLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Continuar Orden</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form id="form_orders">
      		@csrf
        <input type="hidden" id="fk_user" name="fk_user" value="{{Auth::user()->id}}">
        <input type="hidden" id="fk_technical" name="fk_technical">
        <input type="hidden" id="fk_service" name="fk_service">
      	<label>Direccion Orden</label>
    	<select class="form-control container_addresses" name="fk_address">
		  <option>Seleccione...</option>
		</select>
		<br>
		<button type="button" class="btn btn-dark btn_new_address">Nueva Direccion</button>
		<br>
		<br>
		<div class="form-group">
		    <label for="description_order">Descripcion Orden</label>
		    <textarea name="description" class="form-control" id="description_order" rows="3"></textarea>
		  </div>
      	</form>
    	
		<form class="form_add_address" id="form-address">
			<h5>Ingresar Nueva Direccion</h5>
			@csrf
		<div class="form-row">
		    <div class="form-group col-md-12">
		      	<input type="hidden" name="fk_user" class="form-control" value="{{Auth::user()->id}}">
		    </div>
		</div>
		<div class="form-row">
		    <div class="form-group col-md-12">
		      	<label for="address">Dirección</label>
		      	<input type="text" name="address" class="form-control">
		    </div>
		</div>

		<div class="form-row">
		    <div class="form-group col-md-12">
		      	<label for="neighborhood">Barrio</label>
		      	<input type="text" name="neighborhood" class="form-control">
		    </div>
		</div>
		<div class="form-group">
			<label for="departments">Departamentos</label>
			<select name="departments" class="form-control" id="select_departments">
				<option value="">Seleccione Departamento...</option>
			</select>
		</div>
		<div class="form-group">
			<label for="fk_municipality">Municipios</label>
			<select name="fk_municipality" id="select_municipalities" class="form-control">
				<option value="">Seleccione Municipio...</option>
			</select>
		</div>
		<button type="button" class="btn btn-custom" id="btn-add-address">
			<i class="fa fa-save"></i>
			Guardar
		</button>
		<button type="button" class="btn btn-danger" id="btn-cancel-address">
			<i class="fa fa-times"></i>
			Cancelar
		</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-save-order">Finalizar Orden</button>
      </div>
    </div>
  </div>
</div>