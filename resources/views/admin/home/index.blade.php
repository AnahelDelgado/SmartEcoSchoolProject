@extends('layouts.admin')
@section('content')
    <section class="container mt-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <!-- Administración Edificios -->
            <div class="col">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-circle bg-primary p-3 me-3">
                            <i class="fas fa-building fa-2x text-light"></i>
                        </div>
                        <div>
                            <h5 class="card-title">
                                Administración Edificios
                                <a href="#" class="btn btn-link d-inline text-primary" target="_blank"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mediciones -->
            <div class="col">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-circle bg-primary p-3 me-3">
                            <i class="fas fa-chart-line fa-2x text-light"></i>
                        </div>
                        <div>
                            <h5 class="card-title">
                                Mediciones
                                <a href="#" class="btn btn-link d-inline text-primary" target="_blank"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sensores -->
            <div class="col">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-circle bg-primary p-3 me-3">
                            <i class="fas fa-microchip fa-2x text-light"></i>
                        </div>
                        <div>
                            <h5 class="card-title">
                                Sensores
                                <a href="#" class="btn btn-link d-inline text-primary" target="_blank"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tipos Sensores -->
            <div class="col">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-circle bg-primary p-3 me-3">
                            <i class="fas fa-gear fa-2x text-light"></i>
                        </div>
                        <div>
                            <h5 class="card-title">
                                Tipos Sensores
                                <a href="#" class="btn btn-link d-inline text-primary" target="_blank"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Usuarios -->
            <div class="col">
                <div class="card">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-circle bg-primary p-3 me-3">
                            <i class="fas fa-user-group fa-2x text-light"></i>
                        </div>
                        <div>
                            <h5 class="card-title">
                                Usuarios
                                <a href="#" class="btn btn-link d-inline text-primary" target="_blank"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
