   <!-- Fonts -->
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link href="{{ asset('css/technical.css') }}" rel="stylesheet">
  <body>
  	<div class="area">
      <img class="img-home" src="{{ asset('imgs/home_technical.svg') }}">
    </div>

  
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/sweetalert2@9.js') }}"></script>

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
                    confirmButtonColor: '#00796b',
                });
                @endif

                /* ----------------------------------------------------------------------------- */
            });
        </script>

        @include('users.technical.technical-menu')