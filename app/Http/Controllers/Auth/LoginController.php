<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    // Método protegido que se ejecuta después de que un usuario ha sido autenticado
    protected function authenticated()
    {
        // Verifica si el rol del usuario autenticado es '1' (Administrador)
        if(Auth::user()->role_as == '1'){
            // Redirige al panel de administración con un mensaje de bienvenida para el administrador
            return redirect('admin/dashboard')->with('message','Bienvenido Administrador');
        }
        else{
            // Redirige a la página de inicio con un mensaje de bienvenida para el usuario estándar
            return redirect('/home')->with('status','Bienvenido');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Aplica el middleware 'guest' a todas las rutas de este controlador excepto 'logout'
        $this->middleware('guest')->except('logout');
    }
}
