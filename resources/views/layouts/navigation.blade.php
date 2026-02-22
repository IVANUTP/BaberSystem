<style>
    #wrapper {
        min-height: 100vh;
        overflow-x: hidden;
    }

    /* SIDEBAR */
    #sidebar-wrapper {
        width: 260px;
        min-height: 100vh;
        transition: margin 0.3s ease;
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
        transition: all .2s;
    }

    .list-group-item:hover {
        background: #111;
        padding-left: 28px;
    }

    .active-link {
        background: #000 !important;
        border-left: 4px solid #c59d5f;
        font-weight: bold;
    }

    /* HEADER STYLE */
    .page-header {
        background: #fff;
        border-bottom: 1px solid #e9ecef;
    }
</style>

<div class="d-flex" id="wrapper">

    <!-- SIDEBAR -->
    <div class="bg-dark text-white d-flex flex-column" id="sidebar-wrapper">

        @if (auth()->user()->role === 'admin')
            <div class="text-center py-4 border-bottom">
                <a href="{{ route('dashboard') }}"><img src="assets/img/logo/logo.png" alt=""></a>
            </div>
        @endif
        @if (auth()->user()->role === 'barbero')
            <div class="text-center py-4 border-bottom">
                <a href="{{ route('services.index') }}"><img src="assets/img/logo/logo.png" alt=""></a>
            </div>
        @endif


        <div class="list-group list-group-flush flex-grow-1">

            @if (auth()->user()->role === 'admin')
                <a href="{{ route('dashboard') }}"
                    class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('dashboard') ? 'active-link' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
                <a href="{{ route('services.index') }}"
                    class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('services.index') ? 'active-link' : '' }}">
                    <i class="bi bi-scissors me-2"></i> Servicios
                </a>
                <a href="{{ route('appointments.index') }}"
                    class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('appointments.index') ? 'active-link' : '' }}">
                    <i class="bi bi-calendar-check me-2"></i> Citas
                </a>
                 <a href="{{ route('users.index') }}"
                    class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('users.index') ? 'active-link' : '' }}">
                    <i class="bi bi-people me-2"></i> Usuarios
                </a>
            @endif
            @if (auth()->user()->role === 'barbero')
                <a href="{{ route('services.index') }}"
                    class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('services.index') ? 'active-link' : '' }}">
                    <i class="bi bi-scissors me-2"></i> Servicios
                </a>
                <a href="{{ route('appointments.index') }}"
                    class="list-group-item list-group-item-action bg-dark text-white {{ request()->routeIs('appointments.index') ? 'active-link' : '' }}">
                    <i class="bi bi-calendar-check me-2"></i> Citas
                </a>
            @endif

        </div>

        <!-- USER -->
        <div class="p-3 border-top">
            <small>Conectado como:</small>
            <div class="fw-bold">{{ Auth::user()->name }}</div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-light btn-sm w-100 mt-2">
                    <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                </button>
            </form>
        </div>

    </div>

    <!-- PAGE CONTENT -->
    <div id="page-content-wrapper">

        <!-- TOPBAR -->
        <nav class="navbar navbar-light bg-white border-bottom px-4 py-2">

            <!-- Lado izquierdo: botón + título -->
            <div class="d-flex align-items-center gap-3">

                <!-- Botón menú -->
                <button class="btn btn-dark d-flex align-items-center justify-content-center" id="menu-toggle"
                    style="width:40px; height:40px;">
                    <i class="bi bi-list fs-5"></i>
                </button>

                <!-- Título dinámico -->
                @isset($header)
                    <h6 class="mb-0 fw-semibold text-dark">
                        {{ $header }}
                    </h6>
                @endisset

            </div>

            <!-- Lado derecho (por si después agregas usuario, logout, etc.) -->
            <div class="d-flex align-items-center gap-3">
                <!-- Espacio reservado -->
            </div>

        </nav>



        <!-- CONTENT -->
        <div class="container-fluid p-4">
            {{ $slot }}
        </div>

    </div>
</div>

<script>
    document.getElementById("menu-toggle").addEventListener("click", function() {
        document.getElementById("wrapper").classList.toggle("toggled");
    });
</script>
