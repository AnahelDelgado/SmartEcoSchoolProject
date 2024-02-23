<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GraphControllerMensual extends Controller
{
    public function formatear (int $numero)
    {
        return number_format($numero, 0, ',', '.');
    }

    public function acumulativo_mensual(int $id_sensor)
    {
        $query = "SELECT MAX(m.consumo) - MIN(m.consumo) as consumo, DATE_FORMAT(fecha, '%Y-%m') as fecha
        FROM measurements m
        WHERE m.id_sensor = $id_sensor
        GROUP BY DATE_FORMAT(fecha, '%Y-%m')
        ORDER BY m.fecha DESC
        LIMIT 12;
        ";

        return DB::select($query);
    }

    public function index() {
        $electricidad_mensual = $this->acumulativo_mensual(1);
        $agua_mensual = $this->acumulativo_mensual(2);

        return view('graphs.mensual')
            ->with('electricidad_mensual', $electricidad_mensual)
            ->with('agua_mensual', $agua_mensual);
    }
}
