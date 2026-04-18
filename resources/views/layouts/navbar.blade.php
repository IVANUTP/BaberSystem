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
                                        <li><a href="{{ route('sheet.index') }}">Servicios</a></li>
                                        <li><a href="{{ route('blog.index') }}">Blog</a></li>
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
                                    <div class="d-flex align-items-center gap-3">


                                        <div class="dropdown">
                                            <button class="btn position-relative" data-bs-toggle="dropdown">
                                                <i class="bi bi-bell" style="font-size: 1.3rem;"></i>

                                                @if (Auth::user()->unreadNotifications->count() > 0)
                                                    <span
                                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                        {{ Auth::user()->unreadNotifications->count() }}
                                                    </span>
                                                @endif
                                            </button>

                                            <ul class="dropdown-menu dropdown-menu-end shadow" style="width: 300px;">
                                                <li class="dropdown-header fw-bold">Notificaciones</li>

                                                @forelse(Auth::user()->unreadNotifications->take(5) as $notification)
                                                    <li>
                                                        <a href="#" class="dropdown-item small">
                                                            {{ $notification->data['message'] }}
                                                            <br>
                                                            <span class="text-muted" style="font-size: 11px;">
                                                                {{ $notification->created_at->diffForHumans() }}
                                                            </span>
                                                        </a>
                                                    </li>
                                                @empty
                                                    <li class="dropdown-item text-center text-muted">
                                                        Sin notificaciones
                                                    </li>
                                                @endforelse
                                            </ul>
                                        </div>

                                        <div class="dropdown">
                                            <button class="btn header-btn dropdown-toggle" data-bs-toggle="dropdown">
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
