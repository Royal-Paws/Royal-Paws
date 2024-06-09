<div>
    <div class="main-navbar shadow-sm sticky-top">
        <div class="top-navbar">
            <div class="container-fluid">
                <div class="row">

                    <!-- Columna de tamaño medio (7 de 12 columnas) solo visible en pantallas medianas y grandes -->
                    <div class="col-md-7 my-auto d-none d-sm-none d-md-block d-lg-block">
                         <!-- Enlace a la página de inicio -->
                        <a class="nav-link" href="{{url('/')}}">
                            <img src="{{ asset('images/logo_nombre.png') }}" alt="logo" style="width: 8%; max-width: 150px;">
                        </a>
                    </div>
                    

                    <div class="col-md-5 my-auto">
                        <ul class="nav justify-content-end">
                            <!-- Elemento de la lista para mostrar el carrito de compras -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('carrito')}}">
                                    <i class="fa fa-shopping-cart"></i> Carrito (<livewire:frontend.cart.cart-count />)
                                </a>
                            </li>
                            
                            <!-- Condición: si el usuario no ha iniciado sesión -->
                            @guest
                                <!-- Verificar si existe la ruta de inicio de sesión -->
                                @if (Route::has('login'))
                                    <!-- Elemento de la lista para el enlace de inicio de sesión -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                    </li>
                                @endif

                                <!-- Verificar si existe la ruta de registro -->
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                    </li>
                                @endif
                            
                            <!-- Si el usuario ha iniciado sesión -->
                            @else
                            <!-- Elemento de la lista para el menú desplegable del usuario -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i> {{ Auth::user()->name }}
                                </a>
                                <!-- Menú desplegable con opciones para el usuario -->
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ url('compras')}}"> Compras</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                </ul>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Barra de navegación principal -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                    Royale Paws
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Contenido del menú de navegación -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                        <!-- Elementos de la lista para las diferentes categorías -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('categorias') }}">Categorías</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('categorias/esmoquin')}}">Esmoquin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('categorias/vestidos-casuales')}}">Vestidos Casuales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('compras')}}">Compras</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

