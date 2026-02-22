  <header>
      <div class="header-area header-transparent pt-20">
          <div class="main-header header-sticky">
              <div class="container-fluid">
                  <div class="row align-items-center">
                      <!-- Logo -->
                      <div class="col-xl-2 col-lg-2 col-md-1">
                          <div class="logo">
                              <a href="{{ route('catalogo.index') }}"><img src="assets/img/logo/logo.png" alt=""></a>
                          </div>
                      </div>
                      <div class="col-xl-10 col-lg-10 col-md-10">
                          <div class="menu-main d-flex align-items-center justify-content-end">
                              <!-- Main-menu -->
                              <div class="main-menu f-right d-none d-lg-block">
                                  <nav>
                                      <ul id="navigation">
                                          <li class="active"><a href="{{ route('catalogo.index') }}">Inicio</a></li>
                                          <li><a href="about.html">About</a></li>
                                          <li><a href="{{ route('sheet.index') }}">Servicios</a></li>
                                          <li><a href="portfolio.html">Portfolio</a></li>
                                          <li><a href="blog.html">Blog</a>
                                              <ul class="submenu">
                                                  <li><a href="blog.html">Blog</a></li>
                                                  <li><a href="blog_details.html">Blog Details</a></li>
                                                  <li><a href="elements.html">Element</a></li>
                                              </ul>
                                          </li>
                                          <li><a href="contact.html">Contact</a></li>
                                      </ul>
                                  </nav>
                              </div>
                              <div class="header-right-btn f-right d-none d-lg-block ml-30">

                                  {{-- Cuando NO ha iniciado sesión --}}
                                  @guest
                                      <a href="{{ route('register') }}" class="btn header-btn">Regístrate</a>
                                      <a href="{{ route('login') }}" class="btn header-btn ml-2">Iniciar sesión</a>
                                  @endguest

                                  @auth
                                      <div class="dropdown">
                                          <button class="btn header-btn dropdown-toggle" type="button"
                                              data-bs-toggle="dropdown">
                                              {{ Auth::user()->name }}
                                          </button>

                                          <ul class="dropdown-menu dropdown-menu-end">

                                              @if (Auth::user()->isCliente())
                                                  <li>
                                                      <a class="dropdown-item" href="{{ route('sheet.index') }}">
                                                          Ver catálogo
                                                      </a>
                                                  </li>
                                              @endif

                                              <li>
                                                  <hr class="dropdown-divider">
                                              </li>

                                              <li>
                                                  <form method="POST" action="{{ route('logout') }}">
                                                      @csrf
                                                      <button class="dropdown-item">Cerrar sesión</button>
                                                  </form>
                                              </li>
                                          </ul>
                                      </div>
                                  @endauth

                              </div>

                          </div>
                      </div>
                      <!-- Mobile Menu -->
                      <div class="col-12">
                          <div class="mobile_menu d-block d-lg-none"></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- Header End -->
  </header>
