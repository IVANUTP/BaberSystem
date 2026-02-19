<x-guest-layout>

    <style>
        .login-wrapper {
            min-height: 100vh;
        }

        /* LADO IZQUIERDO IMAGEN */
        .login-image {
            background: url('{{ asset('assets/img/gallery/pricing2.png') }}') center/cover no-repeat;
            position: relative;
        }

        .login-image::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, .6);
        }

        .brand {
            position: absolute;
            bottom: 60px;
            left: 60px;
            color: white;
            z-index: 2;
            letter-spacing: 4px;
        }

        /* LADO DERECHO FORM */
        .login-form {
            background: #f8f9fa;
        }

        .card-login {
            border: none;
            border-radius: 12px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, .15);
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

        .alert-info {
            background-color: #f1f1f1;
            border: 1px solid #dcdcdc;
            color: #333;
            border-radius: 8px;
        }
    </style>

    <div class="container-fluid">
        <div class="row login-wrapper">

            {{-- IMAGEN (solo escritorio) --}}
            <div class="col-lg-6 d-none d-lg-block login-image">

                <div class="brand">
                    <h1 class="fw-bold">BARBER SYSTEM</h1>
                    <p>Estilo • Precisión • Profesionalismo</p>
                </div>
            </div>

            {{-- FORMULARIO --}}
            <div class="col-lg-6 d-flex align-items-center justify-content-center login-form">

                <div class="card card-login p-5 w-100" style="max-width:420px;">

                    <h3 class="text-center fw-bold mb-4">Iniciar Sesión</h3>

                    <x-auth-session-status class="mb-3" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="form-control" type="email" name="email"
                                :value="old('email')" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="text-danger small" />
                        </div>

                        <div class="mb-3">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="form-control" type="password" name="password"
                                required />
                            <x-input-error :messages="$errors->get('password')" class="text-danger small" />
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                            <label class="form-check-label" for="remember_me">Recordarme</label>
                        </div>

                        <div class="d-grid mb-3">
                            <button class="btn btn-barber">ENTRAR</button>
                        </div>

                        @if (Route::has('register'))
                            <p class="text-center mb-0">
                                ¿Aún no tienes cuenta?
                                <a href="{{ route('register') }}"><strong>Regístrate</strong></a>
                            </p>
                        @endif
                    </form>
                    <br>
                    <div class="alert alert-info small text-center" role="alert">
                        <strong>¿Eres colaborador?</strong><br>
                        Contacta con el administrador para que te proporcione tus credenciales de acceso.<br>
                        Si te registras desde aquí, serás dado de alta automáticamente como <strong>cliente</strong>.
                    </div>

                </div>


            </div>


        </div>


    </div>

</x-guest-layout>
