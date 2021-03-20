<?php

namespace App\Http\Controllers;

use Exception;
use App\Model\Usuario;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;

class AutenticacionController extends Controller
{
    #region Constructor
    public function __construct()
    {
        $this->middleware('guest', ['only' => ['LoginVista']]);
    }
    #endregion
    #region Vista
    public function PortadaVista()
    {
        return view('Portada.Portada');
    }
    public function LoginVista()
    {
        return view('Autenticacion.Login');
    }
    public function LoginRegistrarVista()
    {
        return view('Autenticacion.LoginRegistrar');
    }
    #endregion
    #region Json
    public function LoginValidarWebJson(Request $request)
    {
        $redirect = "";
        $respuesta = false;
        $email = $request->input('email');
        $password = $request->input('password');
        $usuario_data = Usuario::where('email', $email)->first();
        $token = "";

        if ($usuario_data != null) {
            if (Hash::check($password, $usuario_data->password)) {
                if ($usuario_data->estado != 1) {
                    $mensaje = "La cuenta está bloqueada.";
                } else {
                    $credenciales = $request->only('email', 'password');
                    if (!$token = JWTAuth::attempt($credenciales)) {
                        return response()->json(['error' => 'credenciales invalidas'], 400);
                    } else {
                        \Auth::attempt(['email' => $email, 'password' => $password]);
                        $respuesta = true;
                        $mensaje = 'Bienvenido al sistema ' . $request->input('email');
                        $redirect = "Inicio";
                    }
                }
            } else {
                $mensaje = 'La contraseña ingresada es erronea';
            }
        } else {
            $mensaje = 'El email ingresado no existe en nuestros registros';
        }
        return response()->json(['respuesta' => $respuesta, 'mensaje' => $mensaje, 'redigirir' => $redirect, 'token' => $token]);
    }
    public function LoginValidaAppJson(Request $request)
    {
        $respuesta = false;
        $email = $request->input('email');
        $password = $request->input('password');
        $usuario_data = Usuario::where('email', $email)->first();
        $token = "";

        if ($usuario_data != null) {
            if (Hash::check($password, $usuario_data->password)) {
                if ($usuario_data->estado != 1) {
                    $mensaje = "La cuenta está bloqueada.";
                } else {
                    $credenciales = $request->only('email', 'password');
                    if (!$token = JWTAuth::attempt($credenciales)) {
                        return response()->json(['error' => 'credenciales invalidas'], 400);
                    } else {
                        \Auth::attempt(['email' => $email, 'password' => $password]);
                        $mensaje = "Bienvenido " . $request->input('email');
                        $respuesta = true;
                    }
                }
            } else {
                $mensaje = 'La contraseña ingresada es erronea';
            }
        } else {
            $mensaje = 'El email ingresado no existe en nuestros registros';
        }
        return response()->json(['respuesta' => $respuesta, 'mensaje' => $mensaje, 'token' => $token]);
    }
    public function LoginRegistrarJson(Request $request)
    {
        $respuesta = false;
        $mensaje = "";
        try {
            $data = Usuario::UsuarioRegistrar($request);
            if ($data != null) {
                $req = new Request([
                    'email' => $data->email,
                    'password' => $request->input('password')
                ]);
                $redirect = "";
                $respuesta = false;
                $email = $req->input('email');
                $password = $req->input('password');
                $usuario_data = Usuario::where('email', $email)->first();
                $token = "";

                if ($usuario_data != null) {
                    if (Hash::check($password, $usuario_data->password)) {
                        if ($usuario_data->estado != 1) {
                            $mensaje = "La cuenta está bloqueada.";
                        } else {
                            $credenciales = $req->only('email', 'password');
                            if (!$token = JWTAuth::attempt($credenciales)) {
                                return response()->json(['error' => 'credenciales invalidas'], 400);
                            } else {
                                \Auth::attempt(['email' => $email, 'password' => $password]);
                                $respuesta = true;
                                $mensaje = 'Bienvenido al sistema ' . $req->input('email');
                                $redirect = "Inicio";
                            }
                        }
                    } else {
                        $mensaje = 'La contraseña ingresada es erronea';
                    }
                } else {
                    $mensaje = 'El email ingresado no existe en nuestros registros';
                }
            }
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        return response()->json(['respuesta' => $respuesta, 'mensaje' => $mensaje, 'redigirir' => $redirect, 'token' => $token]);
    }
    public function CerrarSesionJson(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }
    #endregion
}
