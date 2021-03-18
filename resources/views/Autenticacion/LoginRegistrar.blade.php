@extends('Shared.app_auth')

@section('content')
<div class="card mb-0 border-1 border-danger" id="container-login">
    <div class="card-body">
        <form id="frmNuevo" autocomplete="off" class="login-form">
            <div class="text-center mb-3">
                <div class="card-img-actions d-inline-block mb-3">
                    <img class="img-fluid rounded-circle" src="{{asset('assets/image/default.jpg')}}" width="170" height="170" alt="">
                </div>
                <h5 class="mb-0 text-dark">Ingrese sus datos</h5>
            </div>
            <div class="form-group text-center mb-3 mb-md-2">
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input-styled" checked data-fouc value="1" name="tipoUsuario">
                        Operador
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input-styled" data-fouc value="0" name="tipoUsuario">
                        Notificador
                    </label>
                </div>
            </div>
            <div class="form-group form-group-feedback form-group-feedback-left">
                <input type="text" name="email" class="form-control" placeholder="Correo electrónico...">
                <div class="form-control-feedback">
                    <i class="icon-envelop text-muted"></i>
                </div>
            </div>
            <div class="form-group form-group-feedback form-group-feedback-left">
                <input type="password" name="password" id="txtPassword" class="form-control" placeholder="Contraseña">
                <div class="form-control-feedback">
                    <i class="icon-lock2 text-muted"></i>
                </div>
            </div>
            <div class="form-group form-group-feedback form-group-feedback-left">
                <input type="text" name="telefono" class="form-control" placeholder="Teléfono">
                <div class="form-control-feedback">
                    <i class="icon-phone-plus2 text-muted"></i>
                </div>
            </div>
            <div class="form-group">
                <button type="button" id="btnSesion" class="btn bg-danger-800 btn-block">Ingresar <i class="icon-circle-right2 ml-2"></i></button>
            </div>
            <div class="text-center">
                <a href="{{route('login')}}" class="text-danger-800">Volver</a>
            </div>
        </form>
    </div>
</div>
@stop

@push('js')
<script src="{{asset('assets/js/Autenticacion/Registrarse.js')}}"></script>
@endpush