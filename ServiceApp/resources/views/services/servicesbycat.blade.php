@include('layouts.app')
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Servicios</title>
  <link rel="stylesheet" href="{{ asset('css/cards_services_cat.css') }}">
</head>
<body>
  <h1 class="text-center">Nuestros servicios</h1>

  <a class="btn mt-3" href="{{ url('/allCategories') }}" role="button" id="btn-categories"><i class="fa fa-arrow-left"></i>  Categorías</a>

  <div class="cards2">
      @if(count($services) > 0)
        @foreach ($services as $service)
          <div class="card2">
            <div class="card__image-holder">
              <img class="card__image" src="{{ asset($service->image) }}"/>
            </div>
            <div class="card-title2">
              <a href="#" class="toggle-info btn">
                <span class="left"></span>
                <span class="right"></span>
              </a>
              <h2>
                {{$service->name_service}}
              </h2>

            </div>
            <div class="card-flap flap1">
              <div class="card-description2">
                {{$service->description}}
              </div>
              <div class="card-flap flap2">
                <div class="card-actions">
                  <a href="#" class="btn">Solicitar Servicio</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <h4>No hay servicios en esta categoría...</h4>
      @endif
  </div>
  
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script>
  <script src="{{ asset('js/cards-services-cat.js') }}"></script>
</body>
</html>
