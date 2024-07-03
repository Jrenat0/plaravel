<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;
use App\Models\Vehiculo;



class VehiculosController extends Controller
{
    public function index()
    {
        $tipos = Tipo::all();
        $vehiculos = Vehiculo::all();
        return view('vehiculos.index', compact(['vehiculos', 'tipos']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = Tipo::all();
        return view('vehiculos.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vehiculo = new Vehiculo();

        $vehiculo->patente = $request->patente;
        $vehiculo->marca = $request->marca;
        $vehiculo->anio = $request->anio;
        $vehiculo->tipo_id = $request->tipo;
        $vehiculo->precio = $request->precio;
        $vehiculo->estado = 'Disponible';

        $vehiculo->save();
        return redirect()->route('vehiculos.index');
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
    public function edit(Vehiculo $vehiculo)
    {

        $opciones = ['Disponible','Arrendado','De baja', 'En mantenimiento'];

        $tipos = Tipo::all();
        return view('vehiculos.edit', compact(['vehiculo', 'tipos', 'opciones']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        $vehiculo->marca = $request->marca;
        $vehiculo->anio = $request->anio;
        $vehiculo->tipo_id = $request->tipo;
        $vehiculo->estado = $request->estado;
        $vehiculo->save();
        return redirect()->route('vehiculos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return redirect()->route('vehiculos.index');
    }
}
