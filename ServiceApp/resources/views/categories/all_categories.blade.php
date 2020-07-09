@include('layouts.app')
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Categorías</title>

  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway:300,400,800'>
  <link rel='stylesheet' href='https://cdn.linearicons.com/free/1.0.0/icon-font.min.css'>
  <link rel="stylesheet" href="{{ asset('css/cardsCategory.css') }}">
</head>
<body>
  <h1 class="text-center">¡Conoce nuestros servicios!</h1>
  <div class="container-fluid contenedor text-center">
    <div class=" container text-center">
      @if(count($cats) > 0)
        @foreach ($cats as $cat)
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 container_foto ">
            <div class="ver_mas text-center">
              <a href="{{ url("servicesbycategory/".$cat->id) }}">
                <span class="lnr lnr-eye"></span>
              </a>
            </div>
            <article class="text-left">
              <h2>{{$cat->name_category}}</h2>
            </article>
            <img src="{{ asset($cat->image) }}" alt="">
          </div>
        @endforeach
      @else
        <h4>No hay categorías disponibles...</h4>
      @endif
    </div>
  </div>
</body>
</html>
