@extends('Shared.app')

@section('header')
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><span class="font-weight-semibold"> BUSCAR</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
        <div class="header-elements d-none">
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-link btn-float text-default btnRecargar"><i class="icon-reload-alt text-slate-700"></i> <span>RECARGAR</span></button>
                <a href="javascript:void(0)" id="GenerarExcel" class="btn btn-link btn-float text-default"><i class="icon-file-excel text-slate-700"></i> <span>GENERAR EXCEL</span></a>
                <a href="javascript:void(0)" class="btn btn-link btn-float text-default" id="btnBuscar"><i class="icon-search4 text-slate-700"></i> <span>BUSCAR</span></a>
            </div>
        </div>
    </div>

</div>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form id="frmNuevo">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for=""><b>TIPO DE DOCUMENTO:</b></label>
                                <select name="IdtipoDocumento" id="CbIdtipoDocumento" class="form-control" style="width:100%;"></select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for=""><b>NRO DOCUMENTO:</b></label>
                                <input type="text" class="form-control" name="nroDocumento" id="nroDocumento">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for=""><b>REMITENTE:</b></label>
                                <input type="text" class="form-control" name="remitente" id="remitente">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for=""><b>DESTINO:</b></label>
                                <input type="text" class="form-control" name="destino" id="destino">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for=""><b><i class="icon-calendar mr-1"></i>FECHA INICIAL:</b></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm Fecha" id="fechaInicial" name="fechaInicial">
                                        <span class="input-group-append">
                                            <button class="btn btn-light" type="button"><i class="icon-calendar"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for=""><b><i class="icon-calendar mr-1"></i>FECHA FINAL:</b></label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm Fecha" id="fechaFinal" name="fechaFinal">
                                        <span class="input-group-append">
                                            <button class="btn btn-light" type="button"><i class="icon-calendar"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <table id="table" class="table table-bordered table-sm table-striped" style="width:100%"></table>
            </div>
        </div>
    </div>
</div>
@stop

@push('js')
<script src="{{asset('assets/js/Documento/DocumentoFiltro.js')}}"></script>
@endpush