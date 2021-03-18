@extends('Shared.app')

@section('header')
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><span class="font-weight-semibold"> REGISTRAR DOCUMENTO</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
        <div class="header-elements d-none">
            <div class="d-flex justify-content-center">
                <a href="{{route('Inicio.Listar')}}" class="btn btn-link btn-float text-default btnVolver"><i class="icon-arrow-left7 text-slate-700"></i> <span>VOLVER</span></a>
                <button type="button" class="btn btn-link btn-float text-default btnGuardar"><i class="icon-floppy-disk text-slate-700"></i> <span>GUARDAR</span></button>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form id="frmNuevo" autocomplete="off">
                    <div class="row">
                        <div class="col-lg-12">
                            <legend class="font-weight-semibold text-uppercase font-size-sm"><b>INGRESAR INFORMACIÓN:</b></legend>
                        </div>
                        <div class="col-lg-3">
                            <div class="row">
                                <input type="hidden" name="IdUsuario" value="{{Auth::user()->IdUsuario}}">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for=""><b>FECHA:</b></label>
                                        <input type="text" class="form-control Fecha" name="fecha" id="fecha">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for=""><b>TIPO DE DOCUMENTO:</b></label>
                                        <select name="IdtipoDocumento" id="CbIdtipoDocumento" class="form-control" style="width:100%;"></select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for=""><b>NRO DOCUMENTO:</b></label>
                                        <input type="text" class="form-control" name="nroDocumento" id="nroDocumento">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for=""><b>REMITENTE:</b></label>
                                        <input type="text" class="form-control" name="remitente" id="remitente">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for=""><b>DESTINO:</b></label>
                                        <input type="text" class="form-control" name="destino" id="destino">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for=""><b>DIRECCIÓN:</b></label>
                                        <input type="text" class="form-control" name="direccion" id="direccion">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for=""><b>TELEFONO:</b></label>
                                        <input type="text" class="form-control" name="telefono" id="telefono">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for=""><b>PRIORIDAD:</b></label>
                                        <select name="prioridad" id="Cbprioridad" class="form-control" style="width:100%;">
                                            <option value="">-- Seleccione --</option>
                                            <option value="1">ALTA</option>
                                            <option value="2">MEDIA</option>
                                            <option value="3">BAJA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for=""><b>OBSERVACIÓN:</b></label>
                                        <textarea name="observaciones" cols="30" rows="5" class="form-control" style="resize: none;"></textarea>
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
<script src="{{asset('assets/js/Documento/DocumentoRegistrar.js')}}"></script>
<!-- <script src="{{asset('assets/js/Autenticacion/Login.js')}}"></script> -->
@endpush