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

    public function electricidad_ultimas_12_horas()
    {
        $query = "
            SELECT DATE_FORMAT(fecha, '%Y-%m-%d %H:00:00') AS hora, MAX(consumo) AS consumo
            FROM measurements
            WHERE id_sensor = 1
            AND fecha >= NOW() - INTERVAL 12 HOUR
            GROUP BY DATE_FORMAT(fecha, '%Y-%m-%d %H:00:00')
            ORDER BY hora DESC;
        ";

        return DB::select($query);
    }


    public function electricidad_actual ()
    {
        $query = "
        SELECT MAX(t1.consumo) - MAX(t2.consumo) AS diferencia_consumo
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
        ) AS t2;
        ";

        $resultados = DB::select($query);
        return $this->formatear($resultados[0]->diferencia_consumo);
    }

    public function index() {
        $electricidad_actual = $this->electricidad_actual();
        $ultimas_horas = $this->electricidad_ultimas_12_horas();

        return view('graphs.main')
            ->with('electricidad_actual', $electricidad_actual)
            ->with('electricidad_ultimas_12_horas', $ultimas_horas);
    }
}
