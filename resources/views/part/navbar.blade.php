<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      @auth
      <li class="nav-item">
        <a href="{{ route('logout') }}" class="btn btn-primary" onclick="return confirm('Apakah Anda ingin Logout?')">
          <i class="nav-icon fas fa-sign-out-alt"></i>
            Logout
        </a>
      </li>
      @else
      <li class="nav-item">
        <a href="{{ route('login') }}" class="btn btn-primary">
          <i class="nav-icon fas fa-sign-out-alt"></i>
            Login
        </a>
      </li>
      @endauth
    </ul>
  </nav>