@extends('Shared.app')

@section('header')
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><span class="font-weight-semibold"> INICIO</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
        <div class="header-elements d-none">
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-link btn-float text-default btnRecargar"><i class="icon-reload-alt text-slate-700"></i> <span>RECARGAR</span></button>
                <a href="{{route('Documento.Registrarse')}}" class="btn btn-link btn-float text-default"><i class="icon-googleplus5 text-slate-700"></i> <span>NUEVO</span></a>
            </div>
        </div>
    </div>
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> INICIO</a>
            </div>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <div class="breadcrumb-elements-item dropdown p-0">
                    <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-gear mr-2"></i>
                        ACCIÓN
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" id="GenerarExcel" class="dropdown-item"><i class="icon-file-excel"></i> GENERAR EXCEL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
<div class="row">
    <div class="col-md-6 mx-md-auto">
        <div class="card card-body">
            <div class="row text-center">
                <div class="col-4">
                    <p><i class="icon-file-text icon-2x d-inline-block text-info"></i></p>
                    <h5 class="font-weight-semibold mb-0" id="Notificados">0</h5>
                    <span class="text-muted font-size-sm text-uppercase">Notificados</span>
                </div>

                <div class="col-4">
                    <p><i class="icon-file-text icon-2x d-inline-block text-info"></i></p>
                    <h5 class="font-weight-semibold mb-0" id="Pendientes">0</h5>
                    <span class="text-muted font-size-sm text-uppercase">Pendientes</span>
                </div>

                <div class="col-4">
                    <p><i class="icon-file-text icon-2x d-inline-block text-info"></i></p>
                    <h5 class="font-weight-semibold mb-0" id="Total">0</h5>
                    <span class="text-muted font-size-sm text-uppercase">Total</span>
                </div>
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
<script src="{{asset('assets/js/Inicio/InicioListar.js')}}"></script>
@endpush