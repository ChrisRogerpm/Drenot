@extends('Shared.app')

@section('header')
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><span class="font-weight-semibold"> DETALLE DEL DOCUMENTO</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
        <div class="header-elements d-none">
            <div class="d-flex justify-content-center">
                <a href="{{route('Inicio.Listar')}}" class="btn btn-link btn-float text-default btnVolver"><i class="icon-arrow-left7 text-slate-700"></i> <span>VOLVER</span></a>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-white header-elements-inline">
                <h6 class="card-title text-white"> </h6>
                <div class="header-elements">
                    <span class="badge bg-orange p-2" id="EstadoEtiqueta" style="font-size:14px;">PENDIENTE</span>
                </div>
            </div>
            <div class="card-body">
                <form id="frmNuevo" autocomplete="off">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="row">
                                <input type="hidden" name="IdDocumento" id="IdDocumento">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for=""><b>TIPO DE DOCUMENTO:</b></label>
                                        <select name="IdtipoDocumento" id="CbIdtipoDocumento" class="form-control" style="width:100%;" disabled></select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for=""><b>NRO DOCUMENTO:</b></label>
                                        <input type="text" class="form-control" name="nroDocumento" id="nroDocumento" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for=""><b>REMITENTE:</b></label>
                                        <input type="text" class="form-control" name="remitente" id="remitente" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for=""><b>DESTINO:</b></label>
                                        <input type="text" class="form-control" name="destino" id="destino" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for=""><b>FECHA:</b></label>
                                        <input type="text" class="form-control Fecha" name="fecha" id="fecha" disabled>
                                    </div>
                                </div>



                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for=""><b>PRIORIDAD:</b></label>
                                        <select name="prioridad" id="Cbprioridad" class="form-control" style="width:100%;" disabled>
                                            <option value="">-- Seleccione --</option>
                                            <option value="1">ALTA</option>
                                            <option value="2">MEDIA</option>
                                            <option value="3">BAJA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for=""><b>TELEFONO:</b></label>
                                        <input type="text" class="form-control" name="telefono" id="telefono" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3 mb-md-2">
                                        <label class="d-block font-weight-semibold">ESTADO:</label>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" id="Notificado" name="estado" checked data-fouc value="1" disabled>
                                                NOTIFICADO CON ACTA
                                            </label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" id="Devuelto" name="estado" data-fouc value="2" disabled>
                                                DEVUELTO CON INFORME
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-grou2">
                                        <label for=""><b>DIRECCI??N:</b></label>
                                        <input type="text" class="form-control" name="direccion" id="direccion" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for=""><b>OBSERVACI??N:</b></label>
                                        <textarea name="observaciones" id="observaciones" cols="30" rows="5" class="form-control" style="resize: none;" disabled></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@push('js')
<script>
    documento = @json($documento)
</script>
<script src="{{asset('assets/js/Documento/DocumentoDetalle.js')}}"></script>
@endpush