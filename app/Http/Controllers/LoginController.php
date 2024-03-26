<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request)
    {
        //$request->request->add(['username' => Str::slug($request->username)]);
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if(!auth()->attempt($request->only('email','password'))){
            return back()->with('mensaje','Credenciales Incorrectas');
        }

        return redirect()->route('posts.index', auth()->user()->username);
        
        //Otra forma de auntentificar
        //auth()->attempt($request->only('email','password'));

        //Redireccionar
        //return redirect()->route('posts.index');
    }
}
