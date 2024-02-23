<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GraphControllerSemanal extends Controller
{
    public function formatear (int $numero)
    {
        return number_format($numero, 0, ',', '.');
    }

    public function acumulativo_semanal(int $id_sensor)
    {
        $query = "SELECT MAX(m.consumo) - MIN(m.consumo) as consumo, MAX(fecha) as fecha
        FROM measurements m
        WHERE m.id_sensor = $id_sensor
        GROUP BY CONCAT(YEAR(fecha), '-', WEEK(fecha))
        ORDER BY m.fecha DESC
        LIMIT 9;
        ";

        return DB::select($query);
    }

    public function index() {
        $electricidad_semanal = $this->acumulativo_semanal(1);
        $agua_semanal = $this->acumulativo_semanal(2);

        return view('graphs.main')
            ->with('electricidad_semanal', $electricidad_semanal)
            ->with('agua_semanal', $agua_semanal);
    }
}
