<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel de control')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Estilos adicionales */
    </style>
</head>

<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Botón para mostrar/ocultar la barra lateral -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Título de la página -->
            <span class="navbar-brand mb-0 h1">Panel de Control</span>
            <!-- Icono de usuario -->
            <div class="d-flex align-items-center">
                <i class="fas fa-user me-2"></i>
                <span>Nombre de Usuario</span>
            </div>
        </div>
    </nav>

    <!-- Barra lateral -->
    <div class="collapse" id="navbarNav">
        <div class="bg-light border-end" id="sidebar">
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action"><i
                        class="fas fa-building me-2"></i>Edificios</a>
                <a href="#" class="list-group-item list-group-item-action"><i
                        class="fas fa-chart-line me-2"></i>Mediciones</a>
                <a href="#" class="list-group-item list-group-item-action"><i
                        class="fas fa-microchip me-2"></i>Sensores</a>
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-cogs me-2"></i>Tipos
                    Sensores</a>
                <a href="#" class="list-group-item list-group-item-action"><i
                        class="fas fa-users me-2"></i>Usuarios</a>
            </div>
        </div>
    </div>

    <!-- Contenido de la página -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap Bundle con Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
