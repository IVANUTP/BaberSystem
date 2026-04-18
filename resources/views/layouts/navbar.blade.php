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

                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation" class="d-flex align-items-center gap-4">

                                        <!-- LINKS -->
                                        <li><a href="{{ route('catalogo.index') }}">Inicio</a></li>
                                        <li><a href="{{ route('sheet.index') }}">Servicios</a></li>
                                        <li><a href="{{ route('blog.index') }}">Blog</a></li>
                                        <li><a href="#">Contacto</a></li>

                                        @guest
                                            <li>
                                                <a href="{{ route('register') }}" class="btn header-btn">Regístrate</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('login') }}" class="btn header-btn">Iniciar sesión</a>
                                            </li>
                                        @endguest

                                        @auth
                                            <!-- 🔔 NOTIFICACIONES -->
                                            <li class="nav-item dropdown">
                                                <button class="btn btn-notify position-relative" data-bs-toggle="dropdown">
                                                    <i class="bi bi-bell"></i>

                                                    @if (Auth::user()->unreadNotifications->count() > 0)
                                                        <span
                                                            class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                                                            {{ Auth::user()->unreadNotifications->count() }}
                                                        </span>
                                                    @endif
                                                </button>

                                                <ul class="dropdown-menu dropdown-menu-end shadow">
                                                    <li class="dropdown-header">Notificaciones</li>

                                                    @forelse(Auth::user()->unreadNotifications->take(5) as $notification)
                                                        <li>
                                                            <a class="dropdown-item small">
                                                                {{ $notification->data['message'] }}
                                                            </a>
                                                        </li>
                                                    @empty
                                                        <li class="dropdown-item text-muted text-center">
                                                            Sin notificaciones
                                                        </li>
                                                    @endforelse
                                                </ul>
                                            </li>

                                            <!-- 👤 USUARIO -->
                                            <li class="nav-item dropdown">
                                                <button class="btn user-btn dropdown-toggle" data-bs-toggle="dropdown">
                                                    {{ Auth::user()->name }}
                                                </button>

                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <form method="POST" action="{{ route('logout') }}">
                                                            @csrf
                                                            <button class="dropdown-item">Cerrar sesión</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endauth

                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
