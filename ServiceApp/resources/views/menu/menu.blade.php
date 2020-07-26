	<button type="button" class="btn btn-dark btn-menu" data-toggle="modal" data-target="#modalMenu">Menu <i class="fa fa-chevron-right"></i></button>

    <div class="modal left fade" id="modalMenu" tabindex="" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-menu">
                <div class="modal-body">
                    @if(Auth::user()->role == 'Admin')
                    <div class="nav flex-sm-column flex-row">
                    	<a class="item-center img-menu rounded-circle">
                          <img class="rounded-circle" src="{{ asset(Auth::user()->photo) }}" width="140" height="140">
                        </a>
                        <a href="#" class="nav-item nav-link item-center item-name item-color-text">{{ Auth::user()->first_name.' '.Auth::user()->first_lastname }}</a>
                        <a href="{{url('home')}}" class="nav-item nav-link item-color-text item-left item-home"><i class="fa fa-home"></i>  Inicio</a>
                        <a href="{{url('account')}}" class="nav-item nav-link item-color-text item-left"><i class="fa fa-user"></i>  Mi Cuenta</a>
                        <a href="{{url('users')}}" class="nav-item nav-link item-color-text item-left"><i class="fa fa-users"></i>  Módulo Usuarios</a>
                        <a href="{{url('categories')}}" class="nav-item nav-link item-color-text item-left"><i class="fa fa-columns"></i>  Módulo Categorias</a>
                        <a href="{{url('services')}}" class="nav-item nav-link item-color-text item-left"><i class="fa fa-list"></i>  Módulo Servicios</a>
                        <a href="{{ url('/order-index') }}" class="nav-item nav-link item-color-text item-left"><i class="fa fa-business-time"></i>  Módulo Pedidos</a>
                        <a class="nav-item nav-link item-color-text item-left" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out-alt"></i>
                            {{ __('custom.logout') }}
                        </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                @elseif(Auth::user()->role == 'Tecnico')
                <div class="nav flex-sm-column flex-row">
                <a class="item-center img-menu rounded-circle">
                          <img class="rounded-circle" src="{{ asset(Auth::user()->photo) }}" width="140" height="140">
                        </a>
                        <a href="#" class="nav-item nav-link item-center item-name item-color-text">{{ Auth::user()->first_name.' '.Auth::user()->first_lastname }}</a>
                        <a href="{{url('home')}}" class="nav-item nav-link item-color-text item-left item-home"><i class="fa fa-home"></i>  Inicio</a>
                        <a href="{{ url('studies') }}" class="nav-item nav-link item-color-text item-left"><i class="fa fa-list"></i>  Mis Estudios</a>
                        <a href="{{ url('experiences') }}" class="nav-item nav-link item-color-text item-left"><i class="fa fa-folder"></i>  Mis Experiencias</a>
                        <a href="{{url('orders')}}" class="nav-item nav-link item-color-text item-left"><i class="fa fa-table"></i>  Mis Ordenes</a>
                        <a href="{{url('account')}}" class="nav-item nav-link item-color-text item-left"><i class="fa fa-user"></i>  Mi Perfil</a>
                        


                        <a class="nav-item nav-link item-color-text item-left" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out-alt"></i>
                            {{ __('custom.logout') }}
                        </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>        
                @endif
            </div>
        </div>
    </div>
</div>