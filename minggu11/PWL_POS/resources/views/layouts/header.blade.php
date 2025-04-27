  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">

  <!-- Search -->
  <li class="nav-item">
    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
      <i class="fas fa-search"></i>
    </a>
    <div class="navbar-search-block">
      <form class="form-inline">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </li>

  <!-- Fullscreen -->
  <li class="nav-item">
    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
      <i class="fas fa-expand-arrows-alt"></i>
    </a>
  </li>

  <!-- Control Sidebar -->
  <li class="nav-item">
    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
      <i class="fas fa-th-large"></i>
    </a>
  </li>
  @php
    $user = Auth::user();
    @endphp

    <li class="nav-item dropdown">
      <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#" role="button">
        <img src="{{ $user->profile_picture ?? asset('profile_default.png') }}" alt="User Image"
          class="img-circle mr-2" style="width: 32px; height: 32px; object-fit: cover;">

        <div class="d-none d-sm-inline" style="line-height: 1;">
          <span style="font-size: 14px; font-weight: 500;">{{ $user->nama }}</span><br>
          <span style="font-size: 12px; color: #888;">{{ $user->level->level_nama }}</span>
        </div>

        <i class="fas fa-angle-down ml-3"></i>
      </a>

      <div class="dropdown-menu dropdown-menu-right">
  <button 
    onclick="modalAction('{{ url('/' . $user->user_id . '/edit_profile') }}')" 
    class="dropdown-item btn-edit-akun" 
    data-id="{{ $user->user_id }}">
    <i class="fas fa-user-cog mr-2 text-secondary"></i> Edit Akun
  </button>

  <div class="dropdown-divider"></div>

  <a href="{{ url('/logout') }}" class="dropdown-item text-danger">
    <i class="fas fa-sign-out-alt mr-2"></i> Logout
  </a>
</div>

  </ul>
  </nav>
  <!-- /.navbar -->

