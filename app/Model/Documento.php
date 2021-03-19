<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\Auth;

class Documento extends Model
{
    protected $table = "tbl_documento";
    protected $primaryKey = "IdDocumento";
    protected $fillable = [
        'IdtipoDocumento',
        'IdUsuario',
        'fecha',
        'nroDocumento',
        'remitente',
        'destino',
        'direccion',
        'telefono',
        'observaciones',
        'prioridad',
        'estado',
    ];
    public $timestamps = false;

    public static function DocumentoListar()
    {
        $fechaActual = Carbon::now()->toDateString();
        DB::statement(DB::raw('set @row:=0'));
        return DB::select(DB::raw("
        SELECT
            @row:=@row+1 as nroSecuencia,
            td.nombre AS tipoDocumento,
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
            d.estado,
            d.IdDocumento
            FROM tbl_documento AS d 
            JOIN tbl_tipo_documento AS td ON td.IdTipoDocumento = d.IdtipoDocumento
            WHERE d.fecha = '$fechaActual'
        "));
    }

    public static function DocumentoRegistrar(Request $request)
    {
        $data = new Documento();
        $data->IdtipoDocumento = $request->input('IdtipoDocumento');
        $data->IdUsuario = $request->input('IdUsuario');
        $data->fecha = $request->input('fecha');
        $data->nroDocumento = $request->input('nroDocumento');
        $data->remitente = $request->input('remitente');
        $data->destino = $request->input('destino');
        $data->direccion = $request->input('direccion');
        $data->telefono = $request->input('telefono');
        $data->observaciones = $request->input('observaciones');
        $data->prioridad = $request->input('prioridad');
        $data->estado = 1;
        $data->save();
        return $data;
    }
    public static function DocumentoEditar(Request $request)
    {
        $data = Documento::findorfail($request->input('IdDocumento'));
        $data->IdtipoDocumento = $request->input('IdtipoDocumento');
        $data->fecha = $request->input('fecha');
        $data->nroDocumento = $request->input('nroDocumento');
        $data->remitente = $request->input('remitente');
        $data->destino = $request->input('destino');
        $data->direccion = $request->input('direccion');
        $data->telefono = $request->input('telefono');
        $data->observaciones = $request->input('observaciones');
        $data->prioridad = $request->input('prioridad');
        $data->estado = $request->input('estado');
        $data->save();
        return $data;
    }
    public static function DocumentoEliminar(Request $request)
    {
        $data = Documento::findorfail($request->input('IdDocumento'));
        $data->delete();
        return $data;
    }
}
