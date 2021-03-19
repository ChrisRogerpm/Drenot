<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    #region Vista
    public function InicioVista()
    {
        $fechaActual = Carbon::now()->toDateString();
        return view('Panel.Inicio', compact('fechaActual'));
    }
    #endregion
    #region Json
    #endregion
}
