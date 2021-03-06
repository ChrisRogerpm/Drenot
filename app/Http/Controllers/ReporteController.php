<?php

namespace App\Http\Controllers;

use Exception;
use App\Model\Reporte;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function ReporteDocumentoListarVista()
    {
        return view('Reporte.ReporteDocumento');
    }
    public function ReporteDocumentoListarJson(Request $request)
    {
        $data = "";
        $mensaje = "";
        try {
            $data = Reporte::ReporteDocumentoListar($request);
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        return response()->json(['data' => $data, 'mensaje' => $mensaje]);
    }
    public function ReporteGraficoDocumentoListarJson(Request $request)
    {
        $data = "";
        $mensaje = "";
        $respuesta = false;
        try {
            $data = Reporte::ReporteGraficoDocumentoListar($request);
            $respuesta = true;
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        return response()->json(['data' => $data, 'mensaje' => $mensaje, 'respuesta' => $respuesta]);
    }
    public function ReporteTipoDocumentoGraficoJson(Request $request)
    {
        $data = "";
        $mensaje = "";
        $respuesta = false;
        try {
            $data = Reporte::ReporteTipoDocumentoGrafico($request);
            $respuesta = true;
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        return response()->json(['data' => $data, 'mensaje' => $mensaje, 'respuesta' => $respuesta]);
    }
}
