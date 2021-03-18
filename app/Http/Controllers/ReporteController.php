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
}
