<?php

namespace App\Http\Controllers;

use Exception;
use App\Model\TipoDocumento;
use Illuminate\Http\Request;

class TipoDocumentoController extends Controller
{
    public function TipoDocumentoListarJson()
    {
        $data = "";
        $mensaje = "";
        try {
            $data = TipoDocumento::TipoDocumentoListar();
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        return response()->json(['data' => $data, 'mensaje' => $mensaje]);
    }
}
