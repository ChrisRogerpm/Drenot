<?php

namespace App\Http\Controllers;

use Exception;
use App\Utilitarios\Excel;
use Illuminate\Http\Request;

class FuncionesController extends Controller
{
    //
    public function GenerarExcelJson(Request $request)
    {
        $respuesta = "";
        $mensaje_error = "";
        try {
            $respuesta = Excel::GenerarArchivoExcel($request);
        } catch (Exception $ex) {
            $mensaje_error = $ex->errorInfo;
        }
        return response()->json(['respuesta' => $respuesta, 'mensaje' => $mensaje_error]);
    }
}
