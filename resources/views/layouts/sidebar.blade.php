
<aside class="left-sidebar" data-sidebarbg="skin5">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
  <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav" class="p-t-30">
        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('home')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Inicio</span></a></li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Jubilados </span></a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="{{ route('create.superannuated') }}" class="sidebar-link"><i class="mdi mdi-account-plus"></i><span class="hide-menu"> Registrar </span></a></li>
            <li class="sidebar-item"><a href="{{ route('index.superannuated') }}" class="sidebar-link"><i class="mdi mdi-account-multiple-plus"></i><span class="hide-menu"> Consultar </span></a></li>
          </ul>
        </li>
        <li class="sidebar-item"> 
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
            <i class="mdi mdi-table-edit"></i>
            <span class="hide-menu">Punto de cuenta</span>
          </a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Registrar </span></a></li>
            <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="mdi mdi-note-multiple-outline"></i><span class="hide-menu"> Consultar </span></a></li>
            <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="mdi mdi-file-document-box"></i><span class="hide-menu"> Modificar </span></a></li>
          </ul>
        </li>
        <li class="sidebar-item"> 
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
            <i class="mdi mdi-receipt"></i>
            <span class="hide-menu">Gaceta</span>
          </a>
          <ul aria-expanded="false" class="collapse  first-level">
            <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Registrar </span></a></li>
            <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="mdi mdi-note-multiple-outline"></i><span class="hide-menu"> Consultar </span></a></li>
            <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i class="mdi mdi-file-document-box"></i><span class="hide-menu"> Modificar </span></a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>

