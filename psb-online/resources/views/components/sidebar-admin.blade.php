  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard-admin') }}">
          <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-laugh-wink"></i>
          </div>
          <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
          <a class="nav-link" href="{{ route('dashboard-admin') }}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('data-user') }}">
              <i class="fas fa-fw fa-user"></i>
              <span>Data User</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">


  </ul>
  <!-- End of Sidebar -->
