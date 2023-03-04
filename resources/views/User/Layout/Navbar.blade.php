<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="{{route('landing.index')}}"><img src="" class="img-fluit" alt="">TOKO BUKU</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{route('landing.index')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{route('activity.index')}}">Aktivitas</a></li>
          <li><a class="nav-link scrollto o" href="{{route('tambah.index')}}">Fitur Tambahan</a></li>
          
          @if(session()->has('user'))
          <li class="dropdown">
            <a href="#" class="p-0">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar avatar-online">
                    <img src="{{ asset('datauser/' . session()->get('user')->foto) }}" alt class="rounded-circle ms-4" style="width: 40px; height: 40px" />
                  </div>
                </div>
            
                <div class="flex-grow-1">
                  <p class="fw-semibold d-block mb-0" style="line-height: 40px">{{session()->get('user')->name}}</p>
                </div>
              </div>
            </a>
            <ul>
              <li><a href="{{url('logoutuser')}}">Logout</a></li>
            </ul>
          </li>
          @else
            <li><a class="getstarted scrollto" style="background-color: #BF9742; color: white; " href="{{route('loginuser')}}">Login</a></li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
