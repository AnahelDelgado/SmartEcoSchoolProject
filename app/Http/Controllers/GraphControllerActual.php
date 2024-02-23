<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GraphControllerActual extends Controller
{
    public function formatear (int $numero)
    {
        return number_format($numero, 0, ',', '.');
    }

    public function consumo_actual($id_sensor)
    {
        $query = "SELECT MAX(t1.consumo) - MAX(t2.consumo) AS diferencia_consumo
        FROM (
            SELECT consumo
            FROM measurements
            WHERE id_sensor = $id_sensor
            ORDER BY fecha DESC
            LIMIT 2
        ) AS t1
        JOIN (
            SELECT consumo
            FROM measurements
            WHERE id_sensor = $id_sensor
            ORDER BY fecha DESC
            LIMIT 1, 1
        ) AS t2;";

        $resultados = DB::select($query);
        return $this->formatear($resultados[0]->diferencia_consumo ?? 0);
    }

    public function index() {
        $electricidad_actual = $this->consumo_actual(1);
        $agua_actual = $this->consumo_actual(2);

        return view('graphs.actual')
            ->with('electricidad_actual', $electricidad_actual)
            ->with('agua_actual', $agua_actual);
    }
}