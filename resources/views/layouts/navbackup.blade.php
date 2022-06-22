<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Singga</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
    </script>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="card" style="width: 18rem;">
      <div class="card-body">
          Test
      </div>
  </div>
  <a href="/home">Home</a>
  <a href="/datakar">Karyawan</a>
  <a href="/profileadmin">Profile</a>
</div>


<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
                  <a class="navbar-brand ml-2" href="{{ url('/home') }}">
                      {{ config('app.name', 'Sional') }}
                  </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                      <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <!-- Left Side Of Navbar -->
                      <ul class="navbar-nav me-auto">
                      </ul>

                      <!-- Right Side Of Navbar -->
                      <ul class="navbar-nav ms-auto">
                          <!-- Authentication Links -->
                          @guest
                              {{-- @if (Route::has('login')) --}}
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ url('/cusLogin') }}">{{ __('Login') }}</a>
                                  </li>
                              {{-- @endif --}}

                              @if (Route::has('register'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                  </li>
                              @endif
                          @else

                          @endguest
                              @else
                                  <div id="mySidenav" class="sidenav">
                                      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                                      <div class="card" style="width: 18rem;">
                                          <div class="card-body">
                                              Test
                                          </div>
                                      </div>
                                      <a href="/home" img src="/open-iconic/svg/people.svg" alt="icon name">Home</a>
                                      <a href="#">Karyawan</a>
                                      <a href="#">Setting</a>
                                      <a href="#">Resign</a>
                                  </div>

                                  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
                                  <a class="navbar-brand ml-2" href="{{ url('/home') }}">
                                      {{ config('app.name', 'Sional') }}
                                  </a>
                                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                      <span class="navbar-toggler-icon"></span>
                                  </button>

                                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                      <!-- Left Side Of Navbar -->
                                      <ul class="navbar-nav me-auto">

                                      </ul>

                                      <!-- Right Side Of Navbar -->
                                      <ul class="navbar-nav ms-auto">
                                          <!-- Authentication Links -->
                                          @guest
                                              {{-- @if (Route::has('login')) --}}
                                                  <li class="nav-item">
                                                      <a class="nav-link" href="{{ url('/cusLogin') }}">{{ __('Login') }}</a>
                                                  </li>
                                              {{-- @endif --}}

                                              @if (Route::has('register'))
                                                  <li class="nav-item">
                                                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                                  </li>
                                              @endif
                                          @else
                                              <li class="nav-item dropdown">
                                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                      {{ Auth::user()->nama_karyawan }}
                                                  </a>

                                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                                      onclick="event.preventDefault();
                                                                      document.getElementById('logout-form').submit();">
                                                          {{ __('Logout') }}
                                                      </a>

                                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                          @csrf
                                                      </form>
                                                  </div>
                                              </li>
                                          @endguest
                                      @endif
                              @endauth
                                  </ul>
                              </div>
                          </div>
                      </nav>