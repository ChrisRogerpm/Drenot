<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = "tbl_tipo_documento";
    protected $primaryKey = "IdTipoDocumento";
    protected $fillable = [
        'nombre',
        'estado',
    ];
    public $timestamps = false;

    public static function TipoDocumentoListar()
    {
        return TipoDocumento::all();
    }
}
