@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{ asset('/css/main.graph.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
@section('content')
    <main>
        <section class="left">
            <h2 class="color-yellow">
                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.5 3L4.5 21H18L16.5 33L31.5 15H18L19.5 3Z" stroke="white" stroke-width="4"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Energía
            </h2>
            <section class="grid">
                <div class="card">
                    <h4>Consumo actual</h4>
                    <p>Tiempo real</p>
                    <span>10.000 kWh</span>
                </div>
                <div class="card">
                    <h4>Consumo últimas horas</h4>
                    <p>Día actual</p>
                    <div class="canvas">
                        <canvas id="chartUltimasHoras"></canvas>
                    </div>
                </div>
            </section>
        </section>
        <section class="right">
            <h2 class="color-blue">
                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.5 24.45C13.8 24.45 16.5 21.705 16.5 18.375C16.5 16.635 15.645 14.985 13.935 13.59C12.225 12.195 10.935 10.125 10.5 7.95001C10.065 10.125 8.79 12.21 7.065 13.59C5.34 14.97 4.5 16.65 4.5 18.375C4.5 21.705 7.2 24.45 10.5 24.45Z"
                        stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M18.84 9.90003C19.8716 8.25172 20.603 6.4336 21 4.53003C21.75 8.28003 24 11.88 27 14.28C30 16.68 31.5 19.53 31.5 22.53C31.5086 24.6035 30.9013 26.6328 29.7552 28.3607C28.6091 30.0886 26.9757 31.4373 25.0622 32.2358C23.1487 33.0343 21.0411 33.2466 19.0068 32.8459C16.9724 32.4452 15.1028 31.4495 13.635 29.985"
                        stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Agua
            </h2>
        </section>
    </main>
    <script>
        const ctx = document.getElementById('chartUltimasHoras')

        const labels = ['Enero', 'Febrero', 'Marzo', 'Abril']
        const data = {
            labels: labels,
            datasets: [{
                label: 'My First Dataset',
                data: [0, 59, 80, 81],
                fill: true,
                borderColor: '#eab308',
                backgroundColor: '#edd48a',
                tension: 0.2
            }]
        };

        new Chart(ctx, {
            type: 'line',
            data,
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                },
                scales: {
                    x: {
                        beginAtZero: true
                    }
                }
            }
        })
    </script>
@endsection
