<nav class="navbar navbar-expand-md navbar-dark bg-dark  py-3 sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand text-success" href="{{ url('/') }}">
            <i class="fas fa-headphones"></i> &nbsp; Mr Music
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{route('home')}}">Početna<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Request::is('categories') ? 'active' : '' }}" href="{{route('categories')}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Prodavnica
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('categories') }}">Sve kategorije</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ url('/categories/1') }}">Bubnjevi</a>
                  <a class="dropdown-item" href="{{ url('/categories/2') }}">DJ Oprema</a>
                  <a class="dropdown-item" href="{{ url('/categories/3') }}">Gitare</a>
                  <a class="dropdown-item" href="{{ url('/categories/4') }}">Klasični instrumenti</a>
                  <a class="dropdown-item" href="{{ url('/categories/5') }}">Klaviri</a>
                  <a class="dropdown-item" href="{{ url('/categories/6') }}">Ozvučenje</a>

              </li>
              <!-- <li class="nav-item">
                <a class="nav-link {{ Request::is('blog') ? 'active' : '' }}" href="{{ route('blog') }}">Blog</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ route('about') }}">O nama</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{ route('contact')}}">Kontakt</a>
              </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- <form class="form-inline my-2 my-lg-0">
                @csrf -->
                <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-search fa-lg"></i>
                </a>
                <div class="dropdown-menu container-fluid px-5" aria-labelledby="dropdownMenuButton">
                  <div class="container">


                  <div class="form-group ">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Pretraga proizvoda"></input>
                  </div>
                  <div class="rezultat">

                  </div>
                  </div>
                  </div>
              <!-- </form> -->
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown ">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          <i class="far fa-user"> </i>  {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ (Auth::user()->is_admin) ? route('admin.users', [ 'p'=>'id', 's'=>'asc']) : route('order.show')}}">Profil</a>
                            <hr>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li class="nav-item">
                <a class="nav-link  ml-3" href="{{route('cart.checkout')}}">
                         <span class=""><i class="fas fa-shopping-cart fa-lg"></i></span>
                        <span class="badge badge-light">{{Cart::getTotalQuantity()}}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
