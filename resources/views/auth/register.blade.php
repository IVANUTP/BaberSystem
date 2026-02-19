<x-guest-layout>

<style>
    .register-wrapper {
        min-height: 100vh;
    }

    /* Imagen lateral */
    .register-image {
        background: url('{{ asset("assets/img/gallery/pricing2.png") }}') no-repeat center;
        background-size: cover;
        background-position: center left;
        position: relative;
    }

    .register-image::after {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,.6);
    }

    .brand {
        position: absolute;
        bottom: 60px;
        left: 60px;
        color: white;
        z-index: 2;
        letter-spacing: 4px;
    }

    /* Lado formulario */
    .register-form {
        background: #f8f9fa;
    }

    .card-register {
        border: none;
        border-radius: 12px;
        box-shadow: 0 25px 60px rgba(0,0,0,.15);
    }

    .btn-barber {
        background: #1c1c1c;
        color: white;
        padding: 12px;
        font-weight: 600;
        letter-spacing: 2px;
        transition: .3s;
    }

    .btn-barber:hover {
        background: #000;
        transform: translateY(-2px);
    }
</style>

<div class="container-fluid">
    <div class="row register-wrapper">

        {{-- Imagen (solo desktop) --}}
        <div class="col-lg-6 d-none d-lg-block register-image">
            <div class="brand">
                <h1 class="fw-bold">BARBER SYSTEM</h1>
                <p>Únete y agenda tu estilo</p>
            </div>
        </div>

        {{-- Formulario --}}
        <div class="col-lg-6 d-flex align-items-center justify-content-center register-form">

            <div class="card card-register p-5 w-100" style="max-width:460px;">

                <h3 class="text-center fw-bold mb-4">Crear Cuenta</h3>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-3">
                        <x-input-label for="name" :value="__('Nombre')" />
                        <x-text-input id="name" class="form-control"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="text-danger small" />
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-control"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required />
                        <x-input-error :messages="$errors->get('email')" class="text-danger small" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <x-input-label for="password" :value="__('Contraseña')" />
                        <x-text-input id="password" class="form-control"
                            type="password"
                            name="password"
                            required />
                        <x-input-error :messages="$errors->get('password')" class="text-danger small" />
                    </div>

                    <!-- Confirmar -->
                    <div class="mb-4">
                        <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
                        <x-text-input id="password_confirmation" class="form-control"
                            type="password"
                            name="password_confirmation"
                            required />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger small" />
                    </div>

                    <!-- Botón -->
                    <div class="d-grid mb-3">
                        <button class="btn btn-barber">REGISTRARSE</button>
                    </div>

                    <!-- Login -->
                    <p class="text-center mb-0">
                        ¿Ya tienes cuenta?
                        <a href="{{ route('login') }}"><strong>Inicia sesión</strong></a>
                    </p>

                </form>

            </div>

        </div>

    </div>
</div>

</x-guest-layout>
