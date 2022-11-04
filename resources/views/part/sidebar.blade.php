<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('index3.htm') }}l" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">BRIKAS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->nama}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{($menu == 'dashboard') ? 'active' : ''}}">
              <i class="nav-icon fas fa-landmark"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{route('user')}}" class="nav-link {{($menu == 'datauser') ? 'active' : ''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{route('kasmasuk')}}" class="nav-link {{($menu == 'kas_masuk') ? 'active' : ''}}">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Kas Masuk
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{route('kaskeluar')}}" class="nav-link {{($menu == 'kas_keluar') ? 'active' : ''}}">
              <i class="nav-icon fas fa-money-bill"></i> 
              <p>
                Kas Keluar
              </p>
            </a>
          </li>
          <li class="nav-item {{($menu == 'laporan') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Laporan Rekapitulasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('laporankasmasuk') }}" class="nav-link {{($submenu == 'kasmasuk') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kas Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('laporankaskeluar') }}" class="nav-link {{($submenu == 'kaskeluar') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kas Keluar</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
