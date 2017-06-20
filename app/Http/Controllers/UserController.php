<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $data = new User();
        $data->dni      = $request->dni;
        $data->password = bcrypt($request->password);
        $data->nombres  = $request->nombres;
        $data->paterno  = $request->paterno;
        $data->materno  = $request->materno;
        $data->celular  = $request->celular;
        $data->email    = $request->email;
        $data->save();
        dd("hola");
    }

    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('dashboard');
        }
    }
}
