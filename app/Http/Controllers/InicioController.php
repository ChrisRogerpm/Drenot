<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    #region Vista
    public function InicioVista()
    {
        return view('Panel.Inicio');
    }
    #endregion
    #region Json
    #endregion
}
