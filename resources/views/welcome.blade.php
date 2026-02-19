<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Barber System') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .bg-barber {
            background-image: url('{{ asset('assets/img/gallery/gallery2.png') }}');
            /* tu imagen */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            position: relative;
        }

        /* Capa oscura elegante estilo barbería */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.65);
        }

        .content {
            position: relative;
            z-index: 2;
            color: white;
            text-align: center;
        }

        .title {
            font-size: 3rem;
            font-weight: 600;
            letter-spacing: 3px;
        }

        .btn-barber {
            padding: 12px 30px;
            font-size: 1.2rem;
            border-radius: 0;
            letter-spacing: 2px;
        }
    </style>

</head>

<body>

    <div class="bg-barber d-flex justify-content-center align-items-center">

        <div class="overlay"></div>

        <div class="content">
            <h1 class="title mb-4">BIENVENIDOS A</h1>
            <h2 class="display-4 fw-bold mb-5">BARBER SYSTEM</h2>

            <div class="d-flex justify-content-center gap-4">
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-barber">
                    COLABORADOR
                </a>

                <a href="{{ route('catalogo.index') }}" class="btn btn-light btn-barber">
                    CLIENTE
                </a>
            </div>
        </div>

    </div>

</body>


</html>
