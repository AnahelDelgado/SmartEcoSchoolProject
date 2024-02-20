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

    public function acumulativo_mensual(int $id_sensor)
    {
        $query = "SELECT m.id_sensor, m.consumo, CONCAT(YEAR(m.fecha), '-', LPAD(MONTH(m.fecha), 2, '0')) AS fecha
        FROM measurements m
        INNER JOIN (
            SELECT MAX(fecha) AS ultima_fecha
            FROM measurements
            WHERE id_sensor = $id_sensor
            GROUP BY YEAR(fecha), MONTH(fecha)
        ) AS ultimas_fechas ON m.fecha = ultimas_fechas.ultima_fecha
        WHERE m.id_sensor = 1
        ORDER BY m.fecha ASC;";

        return DB::select($query);
    }

    public function acumulativo_semanal(int $id_sensor)
    {
        $query = "SELECT
            m.id_sensor,
            m.consumo,
            m.fecha
        FROM measurements m
        INNER JOIN (
            SELECT MAX(fecha) AS ultima_fecha
            FROM measurements
            WHERE id_sensor = $id_sensor
            GROUP BY YEARWEEK(fecha)
        ) AS ultimas_fechas ON m.fecha = ultimas_fechas.ultima_fecha
        WHERE m.id_sensor = 1
        ORDER BY m.fecha DESC
        LIMIT 9;";

        return DB::select($query);
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
        $electricidad_semanal = $this->acumulativo_semanal(1);
        $electricidad_mensual = $this->acumulativo_mensual(1);
        $agua_actual = $this->consumo_actual(2);
        $agua_semanal = $this->acumulativo_semanal(2);
        $agua_mensual = $this->acumulativo_mensual(2);

        return view('graphs.main')
            ->with('electricidad_actual', $electricidad_actual)
            ->with('electricidad_semanal', $electricidad_semanal)
            ->with('electricidad_mensual', $electricidad_mensual)
            ->with('agua_actual', $agua_actual)
            ->with('agua_semanal', $agua_semanal)
            ->with('agua_mensual', $agua_mensual);
    }
}
