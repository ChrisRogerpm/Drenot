<?php

namespace App\Http\Controllers;

use Exception;
use App\Model\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function UsuarioNotificadorListarJson()
    {
        $data = "";
        $mensaje = "";
        try {
            $data = Usuario::UsuarioNotificadorListar();
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        return response()->json(['data' => $data, 'mensaje' => $mensaje]);
    }
}
