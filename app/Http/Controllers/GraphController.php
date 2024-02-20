<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function formatear (int $numero)
    {
        return number_format($numero, 0, ',', '.');
    }

    public function electricidad_mensual()
    {
        $query = "SELECT m.id_sensor, m.consumo, CONCAT(YEAR(m.fecha), '-', LPAD(MONTH(m.fecha), 2, '0')) AS fecha
        FROM measurements m
        INNER JOIN (
            SELECT MAX(fecha) AS ultima_fecha
            FROM measurements
            WHERE id_sensor = 1
            GROUP BY YEAR(fecha), MONTH(fecha)
        ) AS ultimas_fechas ON m.fecha = ultimas_fechas.ultima_fecha
        WHERE m.id_sensor = 1
        ORDER BY m.fecha ASC
        LIMIT 9;";

        return DB::select($query);
    }

    public function electricidad_semanal()
    {
        $query = "SELECT
            m.id_sensor,
            m.consumo,
            m.fecha
        FROM measurements m
        INNER JOIN (
            SELECT MAX(fecha) AS ultima_fecha
            FROM measurements
            WHERE id_sensor = 1
            GROUP BY YEARWEEK(fecha)
        ) AS ultimas_fechas ON m.fecha = ultimas_fechas.ultima_fecha
        WHERE m.id_sensor = 1
        ORDER BY m.fecha ASC
        LIMIT 9;";

        return DB::select($query);
    }


    public function electricidad_actual()
    {
        $query = "SELECT MAX(t1.consumo) - MAX(t2.consumo) AS diferencia_consumo
        FROM (
            SELECT consumo
            FROM measurements
            WHERE id_sensor = 1
            ORDER BY fecha DESC
            LIMIT 2
        ) AS t1
        JOIN (
            SELECT consumo
            FROM measurements
            WHERE id_sensor = 1
            ORDER BY fecha DESC
            LIMIT 1, 1
        ) AS t2;";

        $resultados = DB::select($query);
        return $this->formatear($resultados[0]->diferencia_consumo);
    }

    public function index() {
        $electricidad_actual = $this->electricidad_actual();
        $electricidad_semanal = $this->electricidad_semanal();
        $electricidad_mensual = $this->electricidad_mensual();

        return view('graphs.main')
            ->with('electricidad_actual', $electricidad_actual)
            ->with('electricidad_semanal', $electricidad_semanal)
            ->with('electricidad_mensual', $electricidad_mensual);
    }
}
