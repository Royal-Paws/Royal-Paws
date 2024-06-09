<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex justify-content-center">
    <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
      <!-- Logo de la marca -->
      <a class="navbar-brand brand-logo" href="/admin/dashboard">
        Royal Paws
        {{--<img src="images/logo.svg" alt="logo"/>--}}
      </a>
      <!-- Logo miniatura de la marca -->
      <a class="navbar-brand brand-logo-mini" href="/admin/dashboard"><img src="{{ asset('images/logo_icon.png') }}" alt="logo" style="width: 80%; max-width: 150px;"></a>
      <!-- Botón para minimizar -->
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <img src="{{ asset('images/logo_icon.png') }}" alt="logo" style="width: 40%; max-width: 150px;">
      </button>
    </div>  
  </div>


  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">

    {{-- Barra de Búsqueda
    <ul class="navbar-nav mr-lg-4 w-100">
      <li class="nav-item nav-search d-none d-lg-block w-100">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="search">
              <i class="mdi mdi-magnify"></i>
            </span>
          </div>
          <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
        </div>
      </li>
    </ul>--}}

    <ul class="navbar-nav navbar-nav-right">

      <!-- Menú de perfil del usuario -->
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
          <img src="{{ asset('images/admin.png') }}" alt="admin" style="width: 30%; max-width: 150px;">
          <span class="nav-profile-name">{{ Auth::user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
           <!-- Opción para cerrar sesión -->
          <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <p class="mdi mdi-logout"> {{ __('Cerrar Sesión') }}</p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>
    </ul>
    <!-- Botón para mostrar el menú lateral en dispositivos móviles -->
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>