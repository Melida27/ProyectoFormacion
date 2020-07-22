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
           	  <span class="txt-span">Solicitar: </span><a href="" class="btn btn-danger"><i class="fa fa-shopping-cart"></i></a>
           	</div>
           </div>
		</div>
	@endforeach
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js/customer.js') }}"></script>

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