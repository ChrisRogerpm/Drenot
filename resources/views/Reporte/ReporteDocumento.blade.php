@extends('Shared.app')

@section('header')
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><span class="font-weight-semibold"> REPORTE</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
        <div class="header-elements d-none">
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-link btn-float text-default btnRecargar"><i class="icon-reload-alt text-slate-700"></i> <span>RECARGAR</span></button>
                <button type="button" class="btn btn-link btn-float text-default btnBuscar"><i class="icon-search4 text-slate-700"></i> <span>BUSCAR</span></button>
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
                <!-- <table id="table" class="table table-bordered table-sm table-striped" style="width:100%"></table> -->
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <!-- <p class="highcharts-description">
                        This demo shows a smoothed area chart with an x-axis plot band
                        highlighting an area of interest at the last two points. Plot bands
                        and plot lines are commonly used to draw attention to certain areas or
                        thresholds.
                    </p> -->
                </figure>
            </div>
        </div>
    </div>
</div>
@stop

@push('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="{{asset('assets/js/Reporte/ReporteDocumento.js')}}"></script>
@endpush