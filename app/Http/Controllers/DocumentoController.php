<?php

namespace App\Http\Controllers;

use Exception;
use App\Model\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    #region Vista
    public function DocumentoRegistrarVista()
    {
        return view('Documento.DocumentoRegistrar');
    }
    public function DocumentoEditarVista($IdDocumento)
    {
        $documento = Documento::findorfail($IdDocumento);
        return view('Documento.DocumentoEditar', compact('documento'));
    }
    #endregion
    #region JSON
    public function DocumentoListarJson()
    {
        $mensaje = "";
        $data = "";
        try {
            $data = Documento::DocumentoListar();
            $detalle = [
                'pendientes' => collect($data)->where('estado', 1)->count(),
                'notifcados' => collect($data)->where('estado', 2)->count(),
                'total' => collect($data)->count(),
            ];
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        return response()->json(['data' => $data, 'mensaje' => $mensaje, 'detalle' => $detalle]);
    }
    public function DocumentoRegistrarJson(Request $request)
    {
        $respuesta = false;
        $mensaje = "";
        try {
            Documento::DocumentoRegistrar($request);
            $respuesta = true;
            $mensaje = "El registro se realizó satisfactoriamente";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        return response()->json(['respuesta' => $respuesta, 'mensaje' => $mensaje]);
    }
    public function DocumentoEditarJson(Request $request)
    {
        $respuesta = false;
        $mensaje = "";
        try {
            Documento::DocumentoEditar($request);
            $respuesta = true;
            $mensaje = "Los cambios han sido guardados corectamente!!";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        return response()->json(['respuesta' => $respuesta, 'mensaje' => $mensaje]);
    }
    #endregion
}
