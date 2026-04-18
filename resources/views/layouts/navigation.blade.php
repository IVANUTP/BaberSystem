<style>
    #wrapper {
        min-height: 100vh;
        overflow-x: hidden;
    }

    /* SIDEBAR */
    #sidebar-wrapper {
        width: 260px;
        min-height: 100vh;
        background: linear-gradient(180deg, #111 0%, #1c1c1c 100%);
        transition: all 0.3s ease;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: -260px;
    }

    /* CONTENT */
    #page-content-wrapper {
        flex: 1;
        width: 100%;
    }

    /* LINKS */
    .list-group-item {
        border: none;
        background: transparent;
        color: #ccc;
        padding: 12px 20px;
        transition: all 0.25s ease;
        border-radius: 8px;
        margin: 4px 10px;
    }

    .list-group-item i {
        font-size: 1.1rem;
    }

    /* HOVER */
    .list-group-item:hover {
        background: #2a2a2a;
        color: #fff;
        padding-left: 25px;
    }

    /* ACTIVE */
    .active-link {
        background: #c59d5f !important;
        color: #000 !important;
        font-weight: 600;
    }

    /* LOGO */
    #sidebar-wrapper img {
        max-width: 120px;
        transition: transform 0.3s ease;
    }

    #sidebar-wrapper img:hover {
        transform: scale(1.05);
    }

    /* USER */
    #sidebar-wrapper .border-top {
        border-color: rgba(255, 255, 255, 0.1) !important;
    }

    /* HEADER */
    .navbar {
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }
</style>
@php $role = auth()->user()->role; @endphp

<div class="d-flex" id="wrapper">

    <!-- SIDEBAR -->
    <div class="text-white d-flex flex-column" id="sidebar-wrapper">

        <!-- LOGO -->
        <div class="text-center py-4 border-bottom">
            <a href="{{ $role === 'admin' ? route('blogAdmin.index') : route('services.index') }}">
                <img src="{{ asset('assets/img/logo/logo.png') }}" alt="logo">
            </a>
        </div>

        <!-- MENU -->
        <div class="list-group flex-grow-1">

            @if ($role === 'admin')
                <a href="{{ route('blogAdmin.index') }}"
                    class="list-group-item {{ request()->routeIs('blogAdmin.index') ? 'active-link' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Blog
                </a>

                <a href="{{ route('services.index') }}"
                    class="list-group-item {{ request()->routeIs('services.index') ? 'active-link' : '' }}">
                    <i class="bi bi-scissors me-2"></i> Servicios
                </a>

                <a href="{{ route('appointments.index') }}"
                    class="list-group-item {{ request()->routeIs('appointments.index') ? 'active-link' : '' }}">
                    <i class="bi bi-calendar-check me-2"></i> Citas
                </a>

                <a href="{{ route('users.index') }}"
                    class="list-group-item {{ request()->routeIs('users.index') ? 'active-link' : '' }}">
                    <i class="bi bi-people me-2"></i> Usuarios
                </a>
            @endif

            @if ($role === 'barbero')
                <a href="{{ route('services.index') }}"
                    class="list-group-item {{ request()->routeIs('services.index') ? 'active-link' : '' }}">
                    <i class="bi bi-scissors me-2"></i> Servicios
                </a>

                <a href="{{ route('appointments.index') }}"
                    class="list-group-item {{ request()->routeIs('appointments.index') ? 'active-link' : '' }}">
                    <i class="bi bi-calendar-check me-2"></i> Citas
                </a>
            @endif

        </div>

        <!-- USER -->
        <div class="p-3 border-top small">
            <div class="text-muted">Conectado como</div>
            <div class="fw-bold">{{ auth()->user()->name }}</div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-light btn-sm w-100 mt-2">
                    <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                </button>
            </form>
        </div>

    </div>

    <!-- CONTENT -->
    <div id="page-content-wrapper">

        <!-- TOPBAR -->
        <nav class="navbar bg-white px-4 py-2">

            <div class="d-flex align-items-center gap-3">

                <button class="btn btn-dark" id="menu-toggle">
                    <i class="bi bi-list"></i>
                </button>

                @isset($header)
                    <h6 class="mb-0 fw-semibold">{{ $header }}</h6>
                @endisset

            </div>

        </nav>

        <!-- CONTENT -->
        <div class="container-fluid p-4">
            {{ $slot }}
        </div>

    </div>

</div>

<script>
    document.getElementById("menu-toggle")?.addEventListener("click", function() {
        document.getElementById("wrapper").classList.toggle("toggled");
    });
</script>
