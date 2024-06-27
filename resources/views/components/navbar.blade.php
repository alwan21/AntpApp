<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
      <li class="nav-item d-xl-none ps-3 d-flex  align-items-start">
        <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
          <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line bg-white"></i>
            <i class="sidenav-toggler-line bg-white"></i>
            <i class="sidenav-toggler-line bg-white"></i>
          </div>
        </a>
      </li>
      <nav aria-label="breadcrumb" class="d-none d-lg-block">
        <h6 class="font-weight-bolder text-white mb-0">{{ $slot }}</h6>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        </div>
        <ul class="navbar-nav justify-content-end">
         
            @auth
            <li class="nav-item dropdown">
              <a href="#" data-bs-toggle="dropdown" id="navbarDropdown" role="button" class="nav-link dropdown-toggle text-white">
              {{ auth()->user()->username }}
              </a>
              <ul class="dropdown-menu dropdown-menu-transparent">
                <li>
                  <a class="dropdown-item" href="#"> 
                    My Profile
                  </a>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/signout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">Sign Out</button>
                  </form>
              </ul>
            </li>
              @else
              <li>
              <a href="/signin" class="nav-link text-white font-weight-bold px-0">
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
              </li>
            @endauth
            
          
          
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->