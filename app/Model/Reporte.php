<?php

namespace App\Model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    public static function ReporteDocumentoListar(Request $request)
    {
        $fechaInicial = $request->input('fechaInicial');
        $fechaFinal = $request->input('fechaFinal');
        DB::statement(DB::raw('set @row:=0'));
        return DB::select(DB::raw("
        SELECT
            @row:=@row+1 as nroSecuencia,
            td.nombre AS tipoDocumento,
            d.IdDocumento,
            d.nroDocumento,
            d.remitente,
            d.destino,
            d.fecha,
            (CASE 
            WHEN d.estado = 1 THEN 'PENDIENTE' 
            WHEN d.estado = 2 THEN 'NOTIFICADO' 
            ELSE '---' END) AS estadoNombre,
            (CASE 
            WHEN d.prioridad = 1 THEN 'ALTA' 
            WHEN d.prioridad = 2 THEN 'MEDIA' 
            WHEN d.prioridad = 3 THEN 'BAJA'
            ELSE '---' END) AS prioridad,
            d.estado
            FROM tbl_documento AS d 
            JOIN tbl_tipo_documento AS td ON td.IdTipoDocumento = d.IdtipoDocumento
            WHERE d.fecha between '$fechaInicial' AND '$fechaFinal'
        "));
    }
    public static function ReporteGraficoDocumentoListar(Request $request)
    {
        $fechaInicial = $request->input('fechaInicial');
        $fechaFinal = $request->input('fechaFinal');
        $fechas = DB::select(DB::raw("SELECT d.fecha FROM tbl_documento AS d WHERE d.fecha BETWEEN '$fechaInicial' AND '$fechaFinal' GROUP by d.fecha"));
        $cantidadPorFechas = [];
        $fechaSolas = [];
        foreach ($fechas as $f) {
            $cantidadPorFechas[] = [
                'fecha' => $f->fecha,
                'pendientes' => collect(DB::select(DB::raw("SELECT d.estado FROM tbl_documento AS d WHERE d.fecha = '$f->fecha' AND d.estado = 1")))->count(),
                'notificados' => collect(DB::select(DB::raw("SELECT d.estado FROM tbl_documento AS d WHERE d.fecha = '$f->fecha' AND d.estado = 2")))->count()
            ];
            $fechaSolas[] = $f->fecha;
        }
        return [
            'fechas' => $fechaSolas,
            'cantidadPorFechas' => $cantidadPorFechas,
            // 'fechasSolas' => $fechaSolas
        ];
    }
}
