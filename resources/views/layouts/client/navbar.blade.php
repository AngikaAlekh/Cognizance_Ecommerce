 <!-- Header Section Begin -->
 <header class="header">
      
      <div class="container">
          <div class="row">
              <div class="col-lg-3">
                  <div class="header__logo">
                      <a href="./index.html"><img src="img/logo.png" alt=""></a>
                  </div>
              </div>
              <div class="col-lg-6">
                  <nav class="header__menu">
                      <ul>
                          <li class="active"><a href="./index.html">Home</a></li>
                          <li><a href="./shop-grid.html">Shop</a></li>

                          <!-- <li><a href="./blog.html">Blog</a></li> -->
                          @if(Auth::user())
                          
    
                            {{-- <ul> --}}
                                <li>
                                    <a>{{ Auth::user()->name }}</a>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            {{-- </ul> --}}
                        {{-- </li> --}}

                          @else
                          <li><a href="{{route('login')}}">Login</a></li>
                          <li><a href="{{route('register')}}">Register</a></li>
                          @endif
                          {{-- <li><a href="./contact.html">Contact</a></li> --}}
                      </ul>
                  </nav>
              </div>
              <div class="col-lg-3">
                  <div class="header__cart">
                      <ul>
                          <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                          <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                      </ul>
                      <div class="header__cart__price">item: <span>$150.00</span></div>
                  </div>
              </div>
          </div>
          <div class="humberger__open">
              <i class="fa fa-bars"></i>
          </div>
      </div>
  </header>
  <!-- Header Section End -->