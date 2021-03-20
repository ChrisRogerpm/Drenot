@extends('Shared.app')

@section('header')
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><span class="font-weight-semibold"> MONITOREO</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
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
                                <label for=""><b>NOTIFICADORES:</b></label>
                                <select name="IdUsuario" id="CbIdUsuario" class="form-control" style="width:100%;"></select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="map-container" id="map_basic"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-transparent header-elements-inline">
                <span class="card-title font-weight-semibold">DATOS PERSONALES</span>
                <!-- <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div> -->
            </div>

            <div class="card-body">
                <ul class="media-list">
                    <li class="media">
                        <div class="mr-3">
                            <a href="#" class="btn bg-transparent border-primary text-primary rounded-round border-2 btn-icon">
                                <i class="icon-user"></i>
                            </a>
                        </div>

                        <div class="media-body">
                            NOMBRE
                            <div class="text-muted font-size-sm">ANDRES ILLACUTIPA CONDORI</div>
                        </div>
                    </li>

                    <li class="media">
                        <div class="mr-3">
                            <a href="#" class="btn bg-transparent border-warning text-warning rounded-round border-2 btn-icon">
                                <i class="icon-cog"></i>
                            </a>
                        </div>

                        <div class="media-body">
                            XJ-AB230
                            <div class="text-muted font-size-sm">MOVILIDAD</div>
                        </div>
                    </li>

                    <li class="media">
                        <div class="mr-3">
                            <a href="#" class="btn bg-transparent border-info text-info rounded-round border-2 btn-icon">
                                <i class="icon-phone2"></i>
                            </a>
                        </div>

                        <div class="media-body">
                            940830485
                            <div class="text-muted font-size-sm">TELÉFONO</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@stop

@push('js')
<!-- Theme JS files -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbF9O9Ks9_-QNWHi2SFxLqLUBOwrMyzXk"></script>
<script src="{{asset('assets/js/Monitoreo/MonitoreoListar.js')}}"></script>
@endpush