<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }

    public function logar(Request $request)
    {
        if(!Auth::attempt($request->only(['email', 'password']))){
            return redirect()->back()->withErrors("Erro ao autenticar");
        }

        return redirect()->route('series.index');
    }
}
