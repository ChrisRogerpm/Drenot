<?php

namespace App\Model;

use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable implements JWTSubject
{
    // use Notifiable;

    protected $table = "tbl_usuario";
    protected $primaryKey = "IdUsuario";
    protected $fillable = [
        'tipoUsuario',
        'email',
        'password',
        'telefono',
        'estado',
    ];
    public $timestamps = false;

    public static function UsuarioRegistrar(Request $request)
    {
        $data = new Usuario();
        $data->tipoUsuario = $request->input('tipoUsuario');
        $data->email = $request->input('email');
        $data->password = bcrypt($request->input('password'));
        $data->telefono = $request->input('telefono');
        $data->estado = 1;
        $data->save();
        return $data;
    }

    public function NivelUsuario()
    {
        $nivel = $this->tipoUsuario;
        $denominacion = "";
        if ($nivel == 1) {
            $denominacion = "OPERADOR";
        } else {
            $denominacion = "NOTIFICADOR";
        }
        return $denominacion;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
