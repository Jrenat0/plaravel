<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Perfil;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class UsuariosController extends Controller
{
    public function index()
    {

        if(Gate::denies('usuarios-gestion')){
            return redirect()->route('home.index');
        }


        $usuarios = Usuario::all();
        $perfiles = Perfil::all();
        
        return view('usuarios.index', compact(['usuarios', 'perfiles']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::denies('usuarios-gestion')){
            return redirect()->route('home.index');
        }
        $perfiles = Perfil::all();
        return view('usuarios.create', compact('perfiles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = new Usuario();

        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->nombre = $request->nombre;
        $usuario->perfil_id = $request->perfil;
        $usuario->save();
        return redirect()->route('usuarios.index');
  
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {

        if(Gate::denies('usuarios-gestion')){
            return redirect()->route('home.index');
        }

        $perfiles = Perfil::all();
        return view('usuarios.edit', compact(['usuario', 'perfiles']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->nombre = $request->nombre;
        $usuario->perfil_id = $request->perfil;
        $usuario->save();
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index');
    }


    public function login(){
        return view('usuarios.login');
    }

    public function logout(){

        Auth::logout();
        return view('usuarios.login');
    }

    public function autenticar(Request $request){


        $credenciales = ['email'=>$request->email,'password'=>$request->password];
        
        if(Auth::attempt($credenciales)){
            $request->session()->regenerate();
            return redirect()->route('usuarios.index');
        }
        return back()->withErrors('Las credenciales ingresadas son incorrectas!!')->onlyInput('email');
    }

}
