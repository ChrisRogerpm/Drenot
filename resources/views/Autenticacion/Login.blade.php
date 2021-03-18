@extends('Shared.app_auth')

@section('content')
<div class="card mb-0 border-1 border-danger" id="container-login">
	<div class="card-body">
		<form id="frmNuevo" autocomplete="off" class="login-form">
			<div class="text-center mb-3">
				<div class="card-img-actions d-inline-block mb-3">
					<img class="img-fluid rounded-circle" src="{{asset('assets/image/default.jpg')}}" width="170" height="170" alt="">
				</div>
				<h5 class="mb-0 text-dark">Ingrese a su cuenta</h5>
				<span class="d-block text-dark">Introduzca sus credenciales a continuación</span>
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
			<div class="form-group">
				<button type="button" id="btnSesion" class="btn bg-danger-800 btn-block">Ingresar <i class="icon-circle-right2 ml-2"></i></button>
			</div>
			<div class="text-center">
				<a href="{{route('Login.Registrarse')}}" class="text-danger-800">Registrarse?</a> | <a href="javascript:void(0)" class="text-danger-800" >Olvide la contraseña?</a>
			</div>
		</form>
	</div>
</div>
@stop

@push('js')
<script src="{{asset('assets/js/Autenticacion/Login.js')}}"></script>
@endpush