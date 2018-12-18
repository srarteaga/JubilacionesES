<!--<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="{{url('home')}}"> <img class="logo" src="{{ asset('img/logo.png') }}"  height="50"> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1">
    <i class="fas fa-bars icono"></i>
  </button>
  <div class="collapse navbar-collapse" id="navbar1">
  <a class="nav-link house" href="{{url('home')}}"><i class="fas fa-home"></i></a>
    <ul class="navbar-nav"> 
      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">Ingresar</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{url('registrar')}}"> Jubilado</a></li>
          <li><a class="dropdown-item" href="#"> Punto de cuenta </a></li>
          <li><a class="dropdown-item" href="{{url('gaceta')}}"> Gaceta </a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('consultar')}}">Consultar</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">Definiciones</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#"> Categoria Ente</a></li>
          <li><a class="dropdown-item" href="#"> Decretos </a></li>
          <li><a class="dropdown-item" href="#"> Motivos </a></li>
          <li><a class="dropdown-item" href="#"> Entes </a></li>
          <li><a class="dropdown-item" href="#"> Firmantes </a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">Reportes</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#"> Estadistico General</a></li>
          <li><a class="dropdown-item" href="#"> Estadistico por Ente </a></li>
          <li><a class="dropdown-item" href="#"> Por Gaceta </a></li>
          <li><a class="dropdown-item" href="#"> Por punto de cuenta </a></li>
          <li><a class="dropdown-item" href="#"> Jubilaciones </a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">Procesos</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#"> reversas Punto</a></li>
          <li><a class="dropdown-item" href="#"> Actualizar gaceta </a></li>
          <li><a class="dropdown-item" href="#"> Pto. Cta. - Decreto </a></li>
          <li><a class="dropdown-item" href="#"> Pto. Cta. - Firmantes </a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>-->

<div id="main-wrapper">
<header class="topbar" data-navbarbg="skin5">
  <nav class="navbar top-navbar navbar-expand-md navbar-dark">
    <div class="navbar-header" data-logobg="skin5">
      <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
      <a class="navbar-brand" href="{{url('home')}}">
        <!-- Logo icon -->
        <b class="logo-icon p-l-10">
          <img src="{{ asset('img/logo-icon.png') }}" alt="homepage" class="light-logo" />
        </b>
         <!-- Logo text -->
        <span class="logo-text">
          <img src="{{ asset('img/logo-text.png') }}" alt="homepage" class="light-logo" />
        </span>
      </a>
      <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
    </div>
    <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
        <!-- nav items -->
      <ul class="navbar-nav float-left mr-auto">
        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
        <!-- USER -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <span class="d-none d-md-block">USUARIO </span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <!-- User profile and search -->
        <li class="nav-item dropdown">
          <a class="dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
          <div class="dropdown-menu dropdown-menu-right user-dd animated">
            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{url('logout')}}"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
            <div class="dropdown-divider"></div>
            <div class="p-l-30 p-10">
              <a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>
