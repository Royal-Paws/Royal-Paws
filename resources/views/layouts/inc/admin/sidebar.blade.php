<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <!-- Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="/admin/dashboard">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <!-- Ventas -->
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-ventas" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-circle-outline menu-icon"></i>
        <span class="menu-title">Ventas</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-ventas">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/admin/compras">Ver Ventas</a></li>
        </ul>
      </div>
    </li>

    <!-- Categorías -->
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-categorias" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-view-headline menu-icon"></i>
        <span class="menu-title">Categorias</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-categorias">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/admin/categoria">Ver Categoria</a></li>
          <li class="nav-item"> <a class="nav-link" href="/admin/categoria/crear">Agregar Categoria</a></li>
        </ul>
      </div>
    </li>

    <!-- Productos -->
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-productos" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-view-headline menu-icon"></i>
        <span class="menu-title">Productos</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-productos">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/admin/producto">Ver Productos</a></li>
          <li class="nav-item"> <a class="nav-link" href="/admin/producto/crear">Agregar Productos</a></li>
        </ul>
      </div>
    </li>

    <!-- Sliders -->
    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/sliders')}}">
        <i class="mdi mdi-view-carousel menu-icon"></i>
        <span class="menu-title">Sliders</span>
      </a>
  </ul>
</nav>