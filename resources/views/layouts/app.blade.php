<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
        <title>Proyecto SmartEcoSchool</title>
        <style>
           /* Para el tamaño del logo */ 
           .logo {
                max-width: 80px;
                height: auto;
                margin-right: 10px;
            }

            .custom-copyright {
                background-color: #58FF33; /* Color de fondo personalizado */
            }

            .custom-bg-color{
                background-color: #58FF33;
            }
        </style>
    </head>
    <body>
        <!-- header --> 

        <nav class="navbar navbar-expand-lg navbar-light custom-bg-color">
            <div class="container">
                <!-- Logo del sitio -->
                <a class="navbar-brand" href="#">
                    <img src="{{ asset("/img/LogoElRincon.png") }}" class="logo">
                    <img src="{{ asset("/img/LogoSmartEcoSchool.png") }}" class="logo">
                </a>
                <!-- Título del sitio -->
                <span class="navbar-text text-dark">
                    <h1>@yield('title', 'SmartEcoSchool IES El Rincon')</h1>
                </span>
            </div>
        </nav>
        <header class="masthead bg-warning text-dark text-center py-4">
            <div class="container d-flex align-items-center flex-column">
                <h2>@yield('subtitle', 'Tabla Energía consumida')</h2>
            </div>
        </header>
        <!-- header --> 

        <!-- footer -->
        <div class="custom-copyright py-4 text-center text-dark">
            <div class="container">
            <small>
                SmartEcoSchool Proyect - 2º DAW
            </small>
            </div>
        </div>
        <!-- footer -->

        <!-- JS Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    </body>
</html>