<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Página Príncipal</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sliderPrincipal.css') }}">
</head>
<body>
     <!-- partial:index.partial.html -->
  <div class="slider-container">
    <div class="slider-control left inactive"></div>
    <div class="slider-control right"></div>
    <ul class="slider-pagi"></ul>
    <div class="slider">
      <div class="slide slide-0 active">
        <div class="slide__bg"></div>
        <div class="slide__content">
         
          <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
            <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
          </svg>
          <div class="slide__text">
            <h2 class="slide__text-heading">Tecnología</h2>
            <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p>
            <a class="slide__text-link" href="{{ url('/allCategories') }}">Conoce nuestros servicios</a>

            <div class="buttons mt-5 ">
              <button type="button" class="btn btn-custom text-center">
                <a href="{{ route('login') }}">
                  <i class="fa fa-lock"></i>
                  {{ __('custom.login') }}
                </a>
              </button>

              <button type="button" class="btn btn-custom ml-3">
                <a href="{{ route('register') }}">
                  <i class="fa fa-user"></i>
                  {{ __('custom.register') }}
                </a>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="slide slide-1 ">
        <div class="slide__bg"></div>
        <div class="slide__content">
          <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
            <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
          </svg>
          <div class="slide__text">
            <h2 class="slide__text-heading">Servicios Hogar</h2>
            <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p>
            <a class="slide__text-link" href="{{ url('/allCategories') }}">Conoce nuestros servicios</a>

            <div class="buttons mt-5 ">
              <button type="button" class="btn btn-custom text-center">
                <a href="{{ route('login') }}">
                  <i class="fa fa-lock"></i>
                  {{ __('custom.login') }}
                </a>
              </button>

              <button type="button" class="btn btn-custom ml-3">
                <a href="{{ route('register') }}">
                  <i class="fa fa-user"></i>
                  {{ __('custom.register') }}
                </a>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="slide slide-2">
        <div class="slide__bg"></div>
        <div class="slide__content">
          <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
            <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
          </svg>
          <div class="slide__text">
            <h2 class="slide__text-heading">Mecánica</h2>
            <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p>
            <a class="slide__text-link" href="{{ url('/allCategories') }}">Conoce nuestros servicios</a>

            <div class="buttons mt-5 ">
              <button type="button" class="btn btn-custom text-center">
                <a href="{{ route('login') }}">
                  <i class="fa fa-lock"></i>
                  {{ __('custom.login') }}
                </a>
              </button>

              <button type="button" class="btn btn-custom ml-3">
                <a href="{{ route('register') }}">
                  <i class="fa fa-user"></i>
                  {{ __('custom.register') }}
                </a>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="slide slide-3">
        <div class="slide__bg"></div>
        <div class="slide__content">
          <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
            <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
          </svg>
          <div class="slide__text">
            <h2 class="slide__text-heading">Telecomunicaciones</h2>
            <p class="slide__text-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio veniam minus illo debitis nihil animi facere, doloremque voluptate tempore quia.</p>
            <a class="slide__text-link" href="{{ url('/allCategories') }}">Conoce nuestros servicios</a>

             <div class="buttons mt-5 ">
              <button type="button" class="btn btn-custom text-center">
                <a href="{{ route('login') }}">
                  <i class="fa fa-lock"></i>
                  {{ __('custom.login') }}
                </a>
              </button>

              <button type="button" class="btn btn-custom ml-3">
                <a href="{{ route('register') }}">
                  <i class="fa fa-user"></i>
                  {{ __('custom.register') }}
                </a>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/sliderPrincipal.js') }}"></script>
</body>
</html>