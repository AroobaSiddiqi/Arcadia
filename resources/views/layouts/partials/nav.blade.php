<nav id="navbar" class="navbar">

<a href="{{url('home')}}" class="logo d-flex align-items-center">
  <img src="{{ asset('img/logo.png') }}" style="height:40px; " alt="">
  <span style="font-family: 'EB Garamond', sans-serif;font-size:30px;font-weight: 400;letter-spacing:1px;color: #017045;">Arcadia</span>
</a>     
<ul>
          <li><a class="nav-link scrollto active" href="/home">Home</a></li>
          <li><a class="nav-link scrollto" href="/aboutUs">About Us</a></li>
          <li class="dropdown"><a href="/allProducts"><span>Products</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/lips">Lips</a></li>
              <li class="dropdown"><a href="#"><span>Face</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="/face/foundations">Foundations</a></li>
                  <li><a href="/face/concealers">Concealers</a></li>
                  <li><a href="/face/primers">Primers</a></li>
                  <li><a href="/face/highlighters">Highlighters</a></li>
                  <li><a href="/face/serums">Serums</a></li>
                </ul>
              </li>
              <li><a href="/eyes">Eyes</a></li>
              <li><a href="#">Other Products</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          @guest
          @if (Route::has('login'))
                                <li>
                                    <a class="getstarted scrollto" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
           @endif
           @if (Route::has('register'))
                                <li>
                                    <a class="getstarted scrollto" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                </li>
           @endif
           @else
                            <li class="dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ url('viewCart') }}">View Cart</a>

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
</ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->