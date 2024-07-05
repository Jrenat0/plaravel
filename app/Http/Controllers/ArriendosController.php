<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArriendosController extends Controller
{
    public function index()
    {
        if(Gate::denies('servicios-gestion')){
            return redirect()->route('home.index');
        } 
        $vehiculos = Vehiculo::all();
        return view('arriendos.index',compact('vehiculos'));
    }


    // No funciona
    public function create(Vehiculo $vehiculo)
    {
        
        $clientes = Cliente::all();

        return view('arriendos.create',compact(['vehiculo','clientes']));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
