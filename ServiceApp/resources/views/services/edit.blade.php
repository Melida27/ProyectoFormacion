@extends('layouts.app')
@section('title', 'Modificar Servicio')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
					    <li class="breadcrumb-item">	
					    	<a href="{{ url('services') }}">
								<i class="fa fa-list"></i>
					    		Lista Servicios
					    	</a>
					    </li>

					    <li class="breadcrumb-item active" aria-current="page">
					    	<i class="fa fa-pen"></i>
					    	Modificar Servicio
					    </li>
					</ol>
				</nav>
				<hr>
				<h1 class="mt-2"><i class="fa fa-pen"></i> Modificar Servicio</h1>
				<hr>
				
				<form action="{{ url('services/'.$service->id) }}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')

					<input type="hidden" name="id" value="{{ $service->id }}">

					<div class="form-group">
						<label for="name_service">Nombre</label>
						<input type="text" name="name_service" class="form-control @error('name_service') is-invalid @enderror" value="{{ $service->name_service }}">

						@error('name_service')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					
					<div class="form-group">
						<button class="btn btn-block btn-custom btn-upload" type="button">
							<i class="fa fa-upload"></i>
							Seleccionar Imágen
						</button>
						<input type="file" name="image" id="photo" class="d-none" accept="image/*">
						<br>
						<div class="text-center @error('image') is-invalid @enderror">
							<img id="preview" class="img-thumbnail" src="{{ asset($service->image) }}" width="120px">
						</div>

						@error('image')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<div class="form-group">
						<label for="description">Descripción</label>
						<textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5">{{ old('description', $service->description) }}</textarea>

						@error('description')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<div class="form-group">
						<label for="fk_category">Categoría</label>
						<select name="fk_category" class="form-control @error('fk_category') is-invalid @enderror">
							<option value="">Seleccione...</option>
							@foreach ($categories as $category)
								<option value="{{ $category->id }}" @if (old('fk_category', $service->fk_category) == $category->id) selected @endif>{{ $category->name_category }}</option>
							@endforeach
						</select>

						@error('fk_category')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-custom">
							<i class="fa fa-save"></i>
							Guardar
						</button>
						<button type="reset" class="btn btn-dark">
							<i class="fa fa-eraser"></i>
							Limpiar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	@include('menu.menu');
@endsection