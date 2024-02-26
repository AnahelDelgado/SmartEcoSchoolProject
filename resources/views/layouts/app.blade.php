<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    @yield('head')
    <title>Proyecto SmartEcoSchool</title>
    <style>
        .logo {
            max-width: 80px;
            height: auto;
            margin-right: 10px;
        }

        .custom-copyright {
            background-color: #297f4c;

        }

        .custom-bg-color {
            background-color: #297f4c;
        }
    </style>
</head>

<body>
    <!-- header -->

    <nav class="navbar navbar-light custom-bg-color">
        <div class="container">
            <!-- Logo del sitio -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('/img/LogoElRincon.png') }}" class="logo">
                <img src="{{ asset('/img/LogoSmartEcoSchool.png') }}" class="logo">
            </a>
            <!-- Título del sitio -->
            <span class="navbar-text text-white">
                <h1>@yield('title', 'SmartEcoSchool IES El Rincon')</h1>
            </span>
        </div>
    </nav>
    <header class="masthead bg-warning text-dark text-center py-1">
        <div class="container d-flex align-items-center flex-column">
            <h2>@yield('subtitle')</h2>
        </div>
    </header>
    <!-- header -->

    <!-- contenido -->
    @yield('content')

    <!-- footer -->
    <div class="custom-copyright py-4 text-center text-white">
        <div class="container">
            <small>
                SmartEcoSchool Proyect - 2º DAW
            </small>
        </div>
    </div>
    <!-- footer -->

    <!-- JS Bootstrap -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
